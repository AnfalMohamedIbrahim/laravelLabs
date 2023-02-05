<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


use Illuminate\View\Component;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware(middleware:"auth");

// create it executes the url that have the dynamic variable 
// Route::get('/posts/create', [PostController::class, 'show'])->name('posts.show');
Route::middleware(['auth'])->group(function () {


Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{postId}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{postId}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::PUT('/postUpdate/{postId}', [PostController::class, 'update'])->name('posts.update');

Route::DELETE('/postDestroy/{postId}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('posts/restore/one/{id}', [PostController::class, 'restore'])->name('posts.restore');
});


// -------------------------users-----------------------------

Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users/store', [UserController::class, 'store'])->name('users.store');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
