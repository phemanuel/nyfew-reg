<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomForgotPasswordController;
use App\Http\Middleware\TrackFailedLoginAttempts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//------Reset Password Route
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
Route::post('/forgot-password', [CustomForgotPasswordController::class, 'forgotPassword'])
    ->middleware('guest')
    ->name('password.email');
Route::get('/reset-password/{token}/{email}', function ($token,$email) {
    return view('auth.user-reset-password', ['token' => $token , 'email' => $email]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', [CustomForgotPasswordController::class, 'resetPassword'])
    ->middleware('guest')
    ->name('password.update');

// -----Login Routes
    Route::get('/', [AuthController::class, 'home'])->name('home');
    Route::get('/signin', [AuthController::class, 'signin'])
    ->name('signin');
    Route::post('signin/store',[AuthController::class, 'signinAction'])
    ->name('signin.action');
    Route::get('signup', [AuthController::class, 'signup'])
    ->name('signup');
    Route::post('signup', [AuthController::class,'signupAction'])
    ->name('signup.action');
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth')
    ->name('logout');

    //---Dashboard routes
    Route::get('user/dashboard', [DashboardController::class,'userDashboard'])->middleware('auth')
    ->name('user-dashboard');


    //----send mail route
    Route::get('send-mail', [MailController::class, 'index'])
    ->name('send-mail');    
    Route::get('subscribe-newsletter', [MailController::class, 'subscribeNewsletter'])
    ->name('subscribe-newsletter');

    //===========Verify email address routes================================
    Route::get('email-verify', [MailController::class, 'emailVerify'])
    ->name('email-verify');
    Route::get('email-verify-done/{token}', [MailController::class, 'emailVerifyDone'])
    ->name('email-verify-done');
    Route::get('resend-verification-email', [MailController::class, 'resendEmailVerification'])
    ->name('resend-verification-email');
    Route::post('resend-verification', [MailController::class, 'resendVerification'])
    ->name('resend-verification');
    Route::post('email-not-verify', [MailController::class, 'emailNotVerify'])
    ->name('email-not-verify');

    Route::get('/test-email', function () {
        // Pass some data to the TestMail
        $data = ['key' => 'value'];  // Ensure this data is correctly passed
        
        \Illuminate\Support\Facades\Mail::to('test@example.com')->send(new \App\Mail\TestMail($data));
    
        return 'Email Sent!';
    });
