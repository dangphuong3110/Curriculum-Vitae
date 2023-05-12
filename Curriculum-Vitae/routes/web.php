<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;


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
});

Route::middleware(['auth'])->group(function () {
    Route::get('/guest', function () {
        return view('index');
    })->name('guest');

    // Route::get('/logout', function () {
    //     Auth::logout();
    //     return redirect('/login');
    // })->name('logout');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');





