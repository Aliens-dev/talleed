<?php

use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPostsController;
use App\Http\Controllers\Admin\AdminTagsController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Category\CategoryPostsController;
use App\Http\Controllers\NotificationController;
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
 * My Routes
 */

Route::get('/', [PagesController::class,'index'])->name('index');
Route::get('/contact', [PagesController::class,'contact'])->name('contact');
Route::post('/contact', [PagesController::class,'contactPost'])->name('contact.post');
Route::get('/about', [PagesController::class,'about'])->name('about');
Route::get('/confidentiality', [PagesController::class,'confidentiality'])->name('confidentiality');

 /*
  * Search
  * */


Route::get('/search', [\App\Http\Controllers\SearchController::class,'index'])->name('search');

Route::post('notifications', [NotificationController::class, 'markAsRead'])->name('notification.markAsRead');

Route::group(['prefix' => 'posts'], function() {
    Route::get('/create', [PostsController::class,'create'])->name('posts.create');
    Route::get('{post}/edit', [PostsController::class,'edit'])->name('posts.edit');
    Route::patch('{post}', [PostsController::class,'update'])->name('posts.update');
    Route::get('{post:slug}', [PostsController::class,'show'])->name('posts.show');
    Route::delete('{post}', [PostsController::class,'destroy'])->name('posts.destroy');
    Route::get('/', [PostsController::class,'index'])->name('posts.index');
    Route::post('/', [PostsController::class,'store'])->name('posts.store');
});

Route::get('/category/{category:slug}', [CategoryPostsController::class,'index'])->name('category.posts.index');

Route::group(['prefix' => 'users'], function() {
    Route::redirect('/{user}', '/users/{user}/profile')->name('users.profile.redirect');
    Route::get('/{user}/profile', [UserProfileController::class,"index"])->name('users.profile');
    Route::get('/{user}/edit', [UserProfileController::class,"edit"])->name('users.edit');
    Route::get('/{user}/pending', [UserProfileController::class,"pending"])->name('users.pending');
    Route::get('/{user}/draft', [UserProfileController::class,"draft"])->name('users.draft');
    Route::patch('/{user}/edit', [UserProfileController::class,"update"])->name('users.update');
    Route::get('/{user}/notifications', [UserProfileController::class,"notifications"])->name('users.notifications');
});

/*
 *  Admin Auth Routes
 */

Route::get('panel_admin/login', [AdminAuthController::class,'index'])->name('admin.login');
Route::post('panel_admin/login', [AdminAuthController::class,'login'])->name('admin.login.post');

Route::group(['prefix' => 'panel_admin', 'middleware' => ['auth','admin.auth']], function() {
    Route::get('/', [AdminDashboardController::class,"index"])->name('admin.dashboard');
    Route::get('/users', [AdminUsersController::class,"index"])->name('admin.users.index');
    Route::post('/users/{user}/status', [AdminUsersController::class,"status"])->name('admin.users.status');
    Route::get('/users/{user}', [AdminUsersController::class,"show"])->name('admin.users.show');
    Route::get('/posts', [AdminPostsController::class,"index"])->name('admin.posts.index');
    Route::get('/categories', [AdminCategoriesController::class,"index"])->name('admin.categories.index');
    Route::get('/tags', [AdminTagsController::class,"index"])->name('admin.tags.index');
    Route::get('/messages', [AdminTagsController::class,"index"])->name('admin.messages.index');
    Route::get('/account', [AdminAccountController::class,"index"])->name('admin.account.index');
    Route::patch('/account', [AdminAccountController::class,"update"])->name('admin.account.update');

    Route::get('/contact', [ContactController::class,"index"])->name('admin.contact.index');
    Route::get('/contact/{id}', [ContactController::class,"show"])->name('admin.contact.show');

    Route::get('/menus', [MenuController::class,"index"])->name('admin.menu.index');
    Route::get('/menus/{id}', [MenuController::class,"show"])->name('admin.menu.show');

});


Route::get('{any?}', [PagesController::class, "notFound"])->name('notFound');
