<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;

// Home Routes
Route::get('/', [PostController::class, 'index'])->name('home');

// About Page Route
Route::get('/about', [SiteController::class, 'about'])->name('about-us');

// single post route
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// category route
Route::get('/categories/{category:slug}', [PostController::class, 'byCategory'])->name('by-category');
