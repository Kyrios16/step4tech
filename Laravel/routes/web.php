<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Feedback\FeedbackController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Post\PostController;


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
//User Route

Route::get('/user/edit', [UserController::class, 'showUserEditView'])->name('edit-user');
Route::post('/user/edit', [UserController::class, 'submitUserEditView'])->name('update-user');
Route::get('/user/view', [UserController::class, 'view'])->name('user-view');
Route::get('/user/password', [UserController::class, 'showChangePasswordView'])->name('change-password-view');
Route::post('/user/password', [UserController::class, 'changePassword'])->name('change-password');

require __DIR__ . '/auth.php';

/* admin management routes start */

// analytics dashboard routes
Route::get('/admin', [UserController::class, 'getMostPopularUser'])->name('show.analytics');

// manage users
Route::get('/admin/users', [UserController::class, 'index'])->name('show.userList');
Route::delete('/admin/users/{id}', [UserController::class, 'deleteUserById'])->name('delete.user');
Route::get('/users/export', [UserController::class, 'export'])->name('export.users');
Route::get('/admin/users/profile/{id}', [UserController::class, 'showUserProfile']);

// manage posts 
Route::get('/admin/posts', [PostController::class, 'index'])->name('show.postList');
Route::get('/posts/export', [PostController::class, 'export'])->name('export.posts');

// manage categories 
Route::get('/admin/categories', function () {
    return view('admin.categories.categories-manage');
});
Route::post('/admin/categories/create',  [CategoriesController::class, 'getCateCreate'])->name('add.categories');
Route::get('categories/export/', [CategoriesController::class, 'export'])->name('export.categories');

/* admin management routes end*/

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
Route::get('/post/detail/{id}',  [PostController::class, 'showPostDetailView'])->name('detail.post');
Route::post('/post/feedback/{id}',  [FeedbackController::class, 'createFeedback'])->name('feedback.post');
