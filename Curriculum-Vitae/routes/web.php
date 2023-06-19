<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\EducationController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return redirect('/guest');
});

Route::get('/cv/{user_id}', function($user_id){
    $homeController = new HomeController;
    return $homeController->index($user_id);
})->name('cv');

Route::middleware(['auth'])->group(function () {
    Route::get('/guest', function () {
        $user = Auth::user();
        return view('guest.profile.index', compact('user'));
    })->name('guest');

    Route::resource('/user', UserController::class);
    Route::get('/user/{id}/password', [UserController::class, 'editPassword'])->name('user.password');
    Route::put('/user/{id}/password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::resource('/about', AboutController::class);
    Route::resource('/skills', SkillController::class);
    Route::resource('/portfolios', PortfolioController::class);
    Route::resource('/work-experiences', WorkExperienceController::class);
    Route::resource('/education', EducationController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register-form');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/verify', [UserController::class, 'verifyCodeForm'])->name('verify-code-form');
Route::post('/verify', [UserController::class, 'verifyCode'])->name('verify-code');

Route::get('/forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('forgot-password-form');
Route::post('/forgot-password', [UserController::class, 'sendResetCode'])->name('send-reset-code');

Route::get('/reset-password', [UserController::class, 'showResetPasswordForm'])->name('reset-password-form');
Route::put('/reset-password/{email}', [UserController::class, 'resetPassword'])->name('reset-password');

Route::get('/{any}', function () {
    return view('error.error');
})->where('any', '.*');







