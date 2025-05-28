<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
   Route::get('/home', [HomeController::class, 'home'])->name('home');
   Route::get('/add', [HomeController::class, 'add'])->name('add');
   Route::get('/detail/{post}', [HomeController::class, 'detail'])->name('detail');
   Route::get('/api/posts', [ApiController::class, 'getPosts']);
   Route::post('/api/posts/{post}/like', [ApiController::class, 'toggleLike']);
   Route::post('/api/posts/{post}/comments', [ApiController::class, 'postComment']);
   Route::get('/api/posts/{id}', [ApiController::class, 'getDetailPost']);
   Route::get('/api/posts/{id}/comments', [ApiController::class, 'getComments']);

});