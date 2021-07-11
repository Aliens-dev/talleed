<?php

use App\Http\Controllers\Category\CategoryPostsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\Users\UserProfile;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PagesController::class,'index'])->name('index');

Route::get('/posts/{post:slug}', [PostsController::class,'show'])->name('post.show');
Route::get('/category/{category:slug}', [CategoryPostsController::class,'index'])->name('category.posts.index');

Route::get('/user/{userId}/profile', [UserProfile::class,"index"])
    ->middleware(['auth','verified'])->name('user.profile');

require __DIR__.'/auth.php';
