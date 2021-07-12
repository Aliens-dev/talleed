<?php

use App\Http\Controllers\Category\CategoryPostsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\Users\UserProfileController;
use Illuminate\Support\Facades\Route;

/** 
 * 
 * Auth Routes
 */
require __DIR__.'/auth.php';

/*
 * Web Routes
 */

Route::get('/', [PagesController::class,'index'])->name('index');
Route::get('/posts/{post:slug}', [PostsController::class,'show'])->name('post.show');
Route::get('/category/{category:slug}', [CategoryPostsController::class,'index'])->name('category.posts.index');
Route::get('/user/{user}/profile', [UserProfileController::class,"index"])->name('user.profile');
Route::get('/user/{user}/edit', [UserProfileController::class,"edit"])->name('user.profile');

