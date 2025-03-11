<?php
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\RegistrationStoreController;
use App\Http\Controllers\Users\RegistrationCreateController;
use App\Http\Controllers\Users\LoginCreateController;
use App\Http\Controllers\Users\LoginStoreController;
use App\Http\Controllers\Users\LoginDestroyController;

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

Route::get('/main', function () {
    return view('user.home');
});

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth');


Route::get('/registration','App\Http\Controllers\RegistrationCreateController')->name('registration');;
Route::post('/registration','App\Http\Controllers\RegistrationStoreController');

Route::get('/login','App\Http\Controllers\LoginCreateController')->name('login');
Route::post('/login','App\Http\Controllers\LoginStoreController');

Route::post('/logout', 'App\Http\Controllers\LoginDestroyController')->name('logout');;

