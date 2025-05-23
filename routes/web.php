<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::fallback(function () {
    return response()->view('public.pages.404');
});

Route::fallback([HomeController::class, 'fallback']);

Route::get('/category',[HomeController::class, 'category'])->name('category');

Route::get('/add-project',[HomeController::class, 'addProject'])->name('add.project');
Route::post('/store-project',[HomeController::class, 'storeProject'])->name('store.project');

Route::get('/projects/{id}/edit',[HomeController::class, 'editProject'])->name('edit.project');
Route::put('/projects/{id}',[HomeController::class, 'updateProject'])->name('update.project');
Route::delete('/projects/{id}',[HomeController::class, 'destroyProject'])->name('delete.project');

Route::get('/chat/{receiver_id}', [HomeController::class, 'indexChat'])->name('chat.index');
Route::post('/chat/send', [HomeController::class, 'sendMessage'])->name('chat.send');
Route::get('/chat/fetch/{receiver_id}', [HomeController::class, 'fetchMessages'])->name('chat.fetch');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/about',[HomeController::class, 'about'])->name('about');

Route::get('/contact',[HomeController::class, 'contact'])->name('contact');

Route::get('/project-details/{id}', [HomeController::class, 'showProject'])->name('project.details');

Route::get('/post/{id}',[HomeController::class, 'post'])->name('category.posts');

Route::get('/profile/{id}',[HomeController::class, 'profile'])->name('profile');

Route::get('/users/{user}/edit', [HomeController::class, 'editUser'])->name('usersprofile.edit');
Route::put('/users/{user}', [HomeController::class, 'updateUser'])->name('usersprofile.update');
Route::delete('/usersprofile/{user}', [HomeController::class, 'destroyUser'])->name('usersprofile.destroy');

Route::post('/toggle-like', [LikeController::class, 'toggleLike'])->name('toggle.like');

Route::post('/project-comments/{id}', [HomeController::class, 'storeComments'])->name('projects.comments.store');

// admin

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/categories', function () {
        return view('admin.categories.index');
    });

    Route::get('/posts', function () {
        return view('admin.posts.index');
    });
});