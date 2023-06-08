<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
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

// Route::get('/', function () {
//     return view('app');
// });


Route::get('/', [ListingController::class, 'index'])->middleware('auth');
Route::get('listing/table', [ListingController::class, 'table'])->middleware('auth');
Route::resource('listing', ListingController::class)->middleware('auth');


Route::get('login', [AuthController::class, "login"])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, "store"])->name('login.store')->middleware('guest');

Route::get('profile', [AuthController::class, "profile"])->name('profile')->middleware('auth');
Route::put('profile', [AuthController::class, "update"])->name('profile.updateAccount');

Route::delete('logout', [AuthController::class, "logout"])->name('logout')->middleware('auth');

Route::get('register', [AuthController::class, "register"])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, "registerStore"])->name('register.registerStore')->middleware('guest');
// Route::get('/', [AuthController::class, 'showCorrectHomepage'])->name('login');
// Route::post('/login', [AuthController::class, "login"])->middleware('guest');
// Route::post('/register', [AuthController::class, 'register']);
// Route::delete('/logout', [AuthController::class, 'logout'])->middleware('mustBeLoggedIn');
