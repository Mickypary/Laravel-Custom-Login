<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthManager;

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
    return view('welcome');
})->name('home')->middleware('auth');


// Route::get('/register', function () {
//     return view('registration');
// });

Route::group(['middleware' => 'auth'], function () {
    // get route function inside here
});

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/signin', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', function () {
        return "Hi";
    });
});

