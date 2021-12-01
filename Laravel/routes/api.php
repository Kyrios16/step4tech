<?php

use App\Http\Controllers\API\Post\PostAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ChartDataController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Reply\ReplyController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * To Show Intial Post List
 */
Route::get('/post-list', [PostAPIController::class, 'showPostListForInitial']);

/**
 * To Show More Post List
 */
Route::get('/post-list/more', [PostAPIController::class, 'showPostListForInitialLoadMore']);

/**
 * Search post
 */
Route::get('/post/search/{searchValue}', [PostAPIController::class, 'searchPost']);

/**
 * To Show Liked Posts
 */
Route::get('/post/like', [PostAPIController::class, 'showLikedPostList']);

/**
 * To Show deleted Posts
 */
Route::get('/post/trash', [PostAPIController::class, 'showDeletedPostList']);

/**
 * To Like Post
 */
Route::post('/post/like', [PostAPIController::class, 'likePost']);

/**
 * To Unlike Post
 */
Route::post('/post/unlike', [PostAPIController::class, 'unlikePost']);

/**
 * To Show Personal Posts
 */
Route::get('/user/posts', [PostAPIController::class, 'showPersonalPostList']);

/**
 * To Delete Personal Posts
 */
Route::delete('/post/delete/{id}', [PostAPIController::class, 'deletePostById']);


/** admin dashboard api routes */
Route::delete('/admin/users/{id}', [UserController::class, 'deleteUserById'])->name('delete.admin.user');
Route::delete('/admin/post/delete/{id}', [PostController::class, 'deletePostById'])->name('delete.admin.post');
Route::post('/admin/categories/update/{categories}',  [CategoriesController::class, 'updateCate'])->name('update.categories');
Route::get('/admin/categories/list', [CategoriesController::class, 'getCateList'])->name('show.categories');
Route::get('/admin/categories/edit/{categories}',  [CategoriesController::class, 'editCate'])->name('edit.categories');
Route::post('/admin/categories/update/{categories}',  [CategoriesController::class, 'updateCate'])->name('update.categories');
Route::delete('/admin/categories/{categories}',  [CategoriesController::class, 'deleteCate'])->name('delete.categories');
Route::get('/admin/totalpost', [PostAPIController::class, 'countTotalPosts'])->name('count.totalPosts');
Route::get('/admin/totaluser', [UserController::class, 'countTotalUsers'])->name('count.totalUsers');
Route::get('/admin/totallike', [PostAPIController::class, 'getMaxLikes']);
Route::get('/admin/favcategory', [CategoriesController::class, 'getMaxFollowers']);
Route::get('/admin/chart', [ChartDataController::class, 'getDailyPostCount']);
/**
 * To Recover Post
 */
Route::post('/post/recover/{id}', [PostAPIController::class, 'recoverPostById']);
