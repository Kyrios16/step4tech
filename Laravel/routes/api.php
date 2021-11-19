<?php

use App\Http\Controllers\API\Post\PostAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ChartDataController;


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
 * To Show All Posts ordered by date
 */
Route::get('/post-list', [PostAPIController::class, 'showPostListForInitial']);

/**
 * Search post
 */
Route::get('/post/search/{searchValue}', [PostAPIController::class, 'searchPost']);

/** admin dashboard api routes */
Route::get('/admin/categories/list', [CategoriesController::class, 'getCateList'])->name('show.categories');
Route::get('/admin/categories/edit/{categories}',  [CategoriesController::class, 'editCate'])->name('edit.categories');
Route::delete('/admin/categories/{categories}',  [CategoriesController::class, 'deleteCate'])->name('delete.categories');
Route::get('/admin/totalpost', [PostAPIController::class, 'countTotalPosts'])->name('count.totalPosts');
Route::get('/admin/totaluser', [UserController::class, 'countTotalUsers'])->name('count.totalUsers');
Route::get('/admin/totallike', [PostAPIController::class, 'getMaxLikes']);
Route::get('/admin/chart', [ChartDataController::class, 'getDailyPostData']);
Route::get('/admin/favcategory', [CategoriesController::class, 'getMaxFollowers']);


/**
 * To Like Post
 */
Route::post('/post/like', [PostAPIController::class, 'likePost']);

/**
 * To Unlike Post
 */
Route::post('/post/unlike', [PostAPIController::class, 'unlikePost']);
