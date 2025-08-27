<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Application;
use App\Models\FailedLogin;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function home()
    {
        return view('auth.auth-login');
    }   

    public function signin()
    {
        return view('auth.auth-login');
    }

    public  function signUp()
    {
        $dueDate = "2025-08-20";
        $regDate = "2025-07-01";
        $currentDate = date('Y-m-d');

        if($currentDate < $regDate){
            return redirect()->back()->with('error', 'Registration has not started, please check back soon.');
        }
        
        if($currentDate > $dueDate){
            return redirect()->route('signin')->with('error', 'Registration Closed.');
        }

        return view('auth.auth-signup');
    }
    
    public  function waitList()
    {
        // $dueDate = "2025-08-20";
        // $regDate = "2025-07-01";
        // $currentDate = date('Y-m-d');

        // if($currentDate < $regDate){
        //     return redirect()->back()->with('error', 'Registration has not started, please check back soon.');
        // }
        
        // if($currentDate > $dueDate){
        //     return redirect()->route('signin')->with('error', 'Registration Closed.');
        // }

        return view('auth.wait-list');
    }
    
    public  function waitListInfo()
    {
        

        return view('auth.wait-list-success');
    }
    
    public function passwordUpdate()
    {
        return view('auth.password-update');
    }
    
    public function passwordUpdateAction(Request $request)
    {
        // Validate inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);
    
        // Check if user exists
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()
                ->withErrors(['email' => 'The email address you entered is invalid, you can signup with a valid email.'])
                ->withInput();
        }
    
        // Update password
        $user->password = Hash::make($request->password);
        $user->save();
    
        Auth::login($user);

        return redirect()->route('user-dashboard')->with('success', 'Password updated successfully and you are now logged in.');
    }

    public function signupAction(Request $request)
    {
        try {
            $validatedData = $request->validate([                
                'email' => 'required|email|unique:users',
                'phone_no' => 'required',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'password.confirmed' => 'The passwords do not match. Please try again.',
            ]);

            $email_token =Str::random(40);

            // Get the user's preferred username            

            $user = User::create([                
                'email' => $validatedData['email'],
                'mobile_no' => $validatedData['phone_no'],
                'password' => Hash::make($validatedData['password']),                
                'email_verified_status' => 0,
                'remember_token' => $email_token,                             
                'image' => 'blank.jpg',
                'user_status' => 1,
                'current_stage' => 1,
                'user_type' => 2,
                'login_attempts' => 0,
                'reg_date' => now(),
            ]);

            Application::create([
                'user_id' => $user->id,
                'status' => 'Not Approved',
                'comment' => 'Not Completed',
                'stage' => 1,
            ]);

            $email_message = "We have sent instructions to verify your email, kindly follow instructions to continue, 
            please check both your inbox and spam folder.";
            session(['email' => $validatedData['email']]);
            session(['full_name' => 'User']);
            session(['email_token' => $email_token]);
            session(['email_message' => $email_message]);

            //return redirect()->route('login')->with('success', 'Account created successful.');
            return redirect('send-mail');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            Log::error('Error during user registration: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }
    
    public function waitListAction(Request $request)
    {
        try {
            $validatedData = $request->validate([                
                'email' => 'required|email|unique:users',
                'phone_no' => 'required',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'password.confirmed' => 'The passwords do not match. Please try again.',
            ]);

            $email_token =Str::random(40);

            // Get the user's preferred username            

            $user = User::create([                
                'email' => $validatedData['email'],
                'mobile_no' => $validatedData['phone_no'],
                'password' => Hash::make($validatedData['password']),                
                'email_verified_status' => 0,
                'remember_token' => $email_token,                             
                'image' => 'blank.jpg',
                'user_status' => 1,
                'current_stage' => 1,
                'user_type' => 2,
                'login_attempts' => 0,
                'applicant_type' => 'WAITLIST',
                'reg_date' => now(),
            ]);

            Application::create([
                'user_id' => $user->id,
                'status' => 'Not Approved',
                'comment' => 'Not Completed',
                'stage' => 1,
            ]);

            // $email_message = "We have sent instructions to verify your email, kindly follow instructions to continue, 
            // please check both your inbox and spam folder.";
            // session(['email' => $validatedData['email']]);
            // session(['full_name' => 'User']);
            // session(['email_token' => $email_token]);
            // session(['email_message' => $email_message]);

            return redirect()->route('wait-list-info');
            // return redirect('send-mail');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            Log::error('Error during user registration: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }

    public function signinAction(Request $request)
    {
        try {
            validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ])->validate();
                
            $userLog = User::where('email', $request->input('email'))->first();
            if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
                //---check the no of attempts=====
                if($userLog->login_attempts < 5){
                    //--increment the number of attempts
                    $userLog->increment('login_attempts');
                    // Log the failed login attempt into the failed_logins table.
                    FailedLogin::create([
                    'ip_address' => $request->ip(),
                    'email' => $request->input('email'),
                ]);
                }
                elseif($userLog->login_attempts >= 5){
                    return redirect()->route('signin')->with('error', 'You have been temporary locked out for 60 seconds.');
                }                
                throw ValidationException::withMessages([
                    'email' => trans('auth.failed')
                ]);
            }            

            // User is authenticated at this point
            $user = Auth::user();
            //---reset the user login attempts----
            Auth::user()->update(['login_attempts' => 0]);
        
            if ($user->email_verified_status == 1) {
                // Email is verified, proceed with login 
                $request->session()->regenerate(); 
                // $intendedUrl = session('url.intended', '/');
                // return redirect()->intended($intendedUrl);
                if($user->applicant_type == 'WAITLIST'){
                    return redirect()->back()->with('error', 'You have joined the waitlist already, kindly wait for a message from our team.');
                }
                else{
                     return redirect()->route('user-dashboard');
                }
               
                // return response()->json([
                //     'status' => 'logged in',
                // ]);
            } else {                    
                // Email is not verified, return a flash message
                //Auth::logout(); // Log the user out since the email is not verified  
                if($user->applicant_type == 'WAITLIST'){
                    return redirect()->back()->with('error', 'You have joined the waitlist already, kindly wait for a message from our team.');
                }
                else{
                     $email_address = $request->email;         
                return view('auth.email-not-verify', compact('email_address'));
                }
                
                 
            }
        } catch (ValidationException $e) {
            // Handle the validation exception
            // You can redirect back with errors or do other appropriate error handling
            return redirect()->route('signin')->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Handle other exceptions, log them, and redirect to an error page
            Log::error('Error during login: ' . $e->getMessage());
            return redirect()->route('signin');
        }    
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');


    }


}
