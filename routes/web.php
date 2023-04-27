<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



// Home Routes
Route::get('/', [PostController::class, 'index'])->name('home');

// single post route
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
