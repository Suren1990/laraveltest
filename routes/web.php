<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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
Route::middleware(['guest'])->get('/',[AuthController::class, 'index'])->name('home');

Route::middleware(['guest'])->prefix('registration')->group(function () {
    Route::get('/',[AuthController::class, 'createRegistration'])->name('create.registration');
    Route::post('/',[AuthController::class, 'storeRegistration'])->name('store.registration');
});

Route::middleware(['guest'])->prefix('login')->group(function () {
    Route::get('/',[AuthController::class, 'createLogin'])->name('create.login');
    Route::post('/',[AuthController::class, 'storeLogin'])->name('store.login');
});

Route::middleware(['auth'])->get('/dashboard',[AuthController::class, 'createDashboard'])->name('dashboard');

Route::get('/logout', function(){
    return redirect('/');
}); // vonca chisht anely es pahy, midlwearov chi stacvum, The GET method is not supported for route logout. Supported methods: DELETE.
Route::delete('/logout', [AuthController::class, 'loginDestroy'])->name('logout')->middleware(['prevent.logout.get']);

Route::middleware(['auth'])->prefix('posts')->group(function () {
    Route::get('/',[PostController::class, 'index'])->name('post.index');
    Route::get('/create',[PostController::class, 'create'])->name('post.create');
    Route::post('/',[PostController::class, 'store'])->name('post.store');
    Route::get('/{post}', [PostController::class, 'show'])->name('post.show');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/{post}/edit', [PostController::class, 'update'])->name('post.update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('post.delete');
});

