'
<?php

use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\User\UserController;

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

Route::get('/user/edit',[UserController::class,'edit'])->name('edit-user');
Route::post('/user/update/{userid}',[UserController::class,'update'])->name('update-user');
Route::get('/user/view',[UserController::class,'view'])->name('user-view');
Route::get('/user/password',[UserController::class,'showChangePasswordView'])->name('change-password-view');
Route::post('/user/password',[UserController::class,'changePassword'])->name('change-password');

Route::get('/admin', function () {
    return view('admin.analytic.analytics-manage');
});

// manage users 
Route::get('/admin/users', function () {
    return view('admin.users-manage');
});

// manage posts 
Route::get('/admin/posts', [PostController::class, 'index'])->name('show.postList');
Route::get('/posts/export', [PostController::class, 'export'])->name('export.posts');

// manage categories 
Route::get('/admin/categories', function () {
    return view('admin.categories.categories-manage');
});
Route::post('/admin/categories/create',  [CategoriesController::class, 'getCateCreate'])->name('add.categories');
Route::get('categories/export/', [CategoriesController::class, 'export'])->name('export.categories');
/* admin dashboard routes /


/**
 * Display All Posts ordered by date
 */
Route::get('/', function () {
    return view('post.index', [
        'title' => 'Home'
    ]);
});



require __DIR__.'/auth.php';

// admin dashboard routes
Route::get('/admin', function () {
    return view('admin.dashboard');
});

// manage users
Route::get('/admin/users', function () {
    return view('admin.users-manage');
});

// manage posts 
Route::get('/admin/posts', [PostController::class, 'index'])->name('show.postList');
Route::get('/posts/export', [PostController::class, 'export'])->name('export.posts');

// manage categories 
Route::get('/admin/categories', function () {
    return view('admin.categories.categories-manage');
});
Route::post('/admin/categories/create',  [CategoriesController::class, 'getCateCreate'])->name('add.categories');
Route::get('categories/export/', [CategoriesController::class, 'export'])->name('export.categories');
/** admin dashboard routes */

require __DIR__.'/auth.php';

// manage posts 
Route::get('/admin/posts', [PostController::class, 'index'])->name('show.postList');
Route::get('/posts/export', [PostController::class, 'export'])->name('export.posts');

// manage categories 
Route::get('/admin/categories', function () {
    return view('admin.categories.categories-manage');
});
Route::post('/admin/categories/create',  [CategoriesController::class, 'getCateCreate'])->name('add.categories');
Route::get('categories/export/', [CategoriesController::class, 'export'])->name('export.categories');
/** admin dashboard routes */

/**
 * Search post
 */
Route::get('/post/search/{searchValue}', [PostController::class, 'searchPost']);
Route::get('/post/create', [PostController::class, 'showPostCreateView'])->name('create.post');
Route::post('/post/create', [PostController::class, 'submitPostCreateView'])->name('create.post');
Route::get('/post/edit/{id}', [PostController::class, 'showPostEditView'])->name('edit.post');
Route::post('/post/edit/{id}', [PostController::class, 'submitPostEdit'])->name('edit.post');
Route::delete('/post/delete/{id}', [PostController::class, 'deletePostById']);
