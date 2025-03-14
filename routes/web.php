<?php
use Illuminate\Support\Arr;
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
// */
Route::get('/main','App\Http\Controllers\User\HomeController@index');
Route::get('/','App\Http\Controllers\User\HomeController@index')->name('home');


Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth');


Route::get('/registration','App\Http\Controllers\User\RegistrationCreateController')->name('registration');
Route::post('/registration','App\Http\Controllers\User\RegistrationStoreController');

Route::get('/login','App\Http\Controllers\User\LoginCreateController')->name('login');
Route::post('/login','App\Http\Controllers\User\LoginStoreController');

Route::post('/logout', 'App\Http\Controllers\User\LoginDestroyController')->name('logout');


Route::get('/posts','App\Http\Controllers\Post\PostIndexController')->name('post.index');
Route::get('/posts/create','App\Http\Controllers\Post\PostCreateController')->name('post.create');
Route::post('/posts','App\Http\Controllers\Post\PostStoreController')->name('post.store');
Route::get('/posts/{post}', 'App\Http\Controllers\Post\PostShowController')->name('post.show');
Route::get('/posts/{post}/edit', 'App\Http\Controllers\Post\PostEditController')->name('post.edit');
Route::patch('/posts/{post}/edit', 'App\Http\Controllers\Post\PostUpdateController')->name('post.update');
Route::delete('/posts/{post}', 'App\Http\Controllers\Post\PostDestroyController')->name('post.delete');


