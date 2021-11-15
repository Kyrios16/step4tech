<?php

use App\Http\Controllers\Post\PostController;
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

/**
 * Display All Posts ordered by date
 */
Route::get('/', function () {
    return view('post.index', [
        'title' => 'Home'
    ]);
});

/**
 * Search post
 */
Route::get('/post/search/{searchValue}', [PostController::class, 'searchPost']);

Route::get('/post/create', [PostController::class, 'showPostCreateView'])->name('create.post');
Route::post('/post/create', [PostController::class, 'submitPostCreateView'])->name('create.post');
Route::get('/post/edit/{id}', [PostController::class, 'showPostEditView'])->name('edit.post');
Route::post('/post/edit/{id}', [PostController::class, 'submitPostEdit'])->name('edit.post');
Route::delete('/post/delete/{id}', [PostController::class, 'deletePostById']);
