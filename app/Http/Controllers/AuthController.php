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
        return view('auth.auth-signup');
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
                'user_type' => 'User',
                'login_attempts' => 0,
                'reg_date' => now(),
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
                    FailedLogins::create([
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
                //return redirect()->route('home');
                return response()->json([
                    'status' => 'logged in',
                ]);
            } else {                    
                // Email is not verified, return a flash message
                //Auth::logout(); // Log the user out since the email is not verified                    
                $email_address = $request->email;         
                 return view('auth.email-not-verify');
                 
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


}
