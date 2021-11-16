<?php

use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// admin dashboard routes
Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/users', function () {
    return view('admin.users-manage');
});

Route::get('/admin/posts', function () {
    return view('admin.posts-manage');
});

Route::get('/admin/categories', function () {
    return view('admin.categories.categories-manage');
});

Route::post('/admin/categories/create',  [CategoriesController::class, 'getCateCreate'])->name('add.categories');

Route::get('categories/export/', [CategoriesController::class, 'export'])->name('export.categories');


Route::get('/post/create', [PostController::class, 'showPostCreateView'])->name('create.post');
Route::post('/post/create', [PostController::class, 'submitPostCreateView'])->name('create.post');
Route::get('/post/edit/{id}', [PostController::class, 'showPostEditView'])->name('edit.post');
Route::post('/post/edit/{id}', [PostController::class, 'submitPostEdit'])->name('edit.post');
Route::delete('/post/delete/{id}', [PostController::class, 'deletePostById']);
