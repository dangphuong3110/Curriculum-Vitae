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
    return redirect('/guest');;
});

Route::get('/cv/{user_id}', function($user_id){
    $homeController = new HomeController;
    return $homeController->index($user_id);
})->name('cv');

Route::middleware(['auth'])->group(function () {
    Route::get('/guest', function () {
        $user = Auth::user();
        return view('guest/profile/index', compact('user'));
    })->name('guest');

    Route::resource('/user', UserController::class);
    Route::get('/user/{id}/password', [UserController::class, 'editPassword'])->name('user.password');
    Route::put('/user/{id}/password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::resource('/about', AboutController::class);
    Route::resource('/skills', SkillController::class);
    Route::resource('/portfolios', PortfolioController::class);
    Route::resource('/work-experiences', WorkExperienceController::class);
    Route::resource('/education', EducationController::class);
    Route::get('/logout' ,function () {
        redirect('/login');
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');






