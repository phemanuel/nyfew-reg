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
    Route::get('user/application/stage1/{id}', [DashboardController::class,'edit'])->middleware('auth')
    ->name('stage1');
    Route::get('/user/application/stage1/{id}/edit', [DashboardController::class, 'edit'])->middleware('auth')
    ->name('user.edit');
    Route::put('/user/application/updateStage1/{id}', [DashboardController::class, 'updateStage1'])
    ->middleware('auth')
    ->name('user.updateStage1'); 
    Route::get('user/application/stage2', [DashboardController::class,'stage2Edit'])->middleware('auth')
    ->name('stage2');   
    Route::get('user/application/updateStage2', [DashboardController::class,'stage2'])->middleware('auth')
    ->name('user.updateStage2');
    Route::get('user/application/stage3', [DashboardController::class,'stage3'])->middleware('auth')
    ->name('stage3');
    Route::get('user/application/updateStage3', [DashboardController::class,'stage3'])->middleware('auth')
    ->name('user.updateStage3');
    Route::get('user/application/stage4', [DashboardController::class,'stage4'])->middleware('auth')
    ->name('stage4');
    Route::get('user/application/updateStage4', [DashboardController::class,'stage4'])->middleware('auth')
    ->name('user.updateStage4');
    Route::get('/fetch-stage-data/{stage}', [DashboardController::class, 'fetchStageData'])
    ->name('fetch.stage.data');
    
   



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

    
