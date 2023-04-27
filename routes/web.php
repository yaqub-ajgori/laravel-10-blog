<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



// Home & Post Routes
Route::get('/', [PostController::class, 'index'])->name('home');
