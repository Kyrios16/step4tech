<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Feedback\FeedbackController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Reply\ReplyController;
use Illuminate\Support\Facades\Auth;

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


Route::group(['middleware' => 'prevent-back-history'], function () {

    //User Route
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/user/edit', [UserController::class, 'showUserEditView'])->name('edit-user');
        Route::post('/user/edit', [UserController::class, 'submitUserEditView'])->name('update-user');
        Route::get('/user/password', [UserController::class, 'showChangePasswordView'])->name('change-password-view');
        Route::post('/user/password', [UserController::class, 'changePassword'])->name('change-password');
    });


    Route::get('/user/view/{id}', [UserController::class, 'view'])->name('user-view');

    require __DIR__ . '/auth.php';

    /* admin management routes start */

    Route::group(['middleware' => ['admin', 'auth']], function () {
        // analytics dashboard routes
        Route::get('/admin', [UserController::class, 'getMostPopularUser'])->name('show.analytics');

        // manage users
        Route::get('/admin/users', [UserController::class, 'index'])->name('show.userList');
        Route::delete('/admin/users/{id}', [UserController::class, 'deleteUserById'])->name('delete.user');
        Route::get('/users/export', [UserController::class, 'export'])->name('export.users');
        Route::get('/admin/users/profile/{id}', [UserController::class, 'showUserProfile']);

        // manage posts 
        Route::get('/admin/posts', [PostController::class, 'index'])->name('show.postList');
        Route::delete('/admin/post/delete/{id}', [PostController::class, 'deletePostById']);
        Route::get('/posts/export', [PostController::class, 'export'])->name('export.posts');

        // manage categories 
        Route::get('/admin/categories', function () {
            return view('admin.categories.categories-manage');
        })->name('show.categories');
        Route::post('/admin/categories/create',  [CategoriesController::class, 'getCateCreate'])->name('add.categories');
        Route::get('categories/export/', [CategoriesController::class, 'export'])->name('export.categories');
    });
    /* admin management routes end*/

    /**
     * Display All Posts ordered by date
     */
    Route::get('/', [PostController::class, 'showPostList'])->name('home');
    /**
     * Search post
     */
    Route::get('/post/search/{searchValue}', [PostController::class, 'searchPost']);

    /**
     * Display All Liked Posts
     */
    Route::get('/post/liked-posts', [PostController::class, 'showLikedPostList'])->middleware('auth');

    /**
     * Display All Deleted Posts
     */
    Route::get('/post/trash', [PostController::class, 'showDeletedPostList'])->middleware('auth');

    /**
     * Post Create and Update
     */
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/post/create', [PostController::class, 'showPostCreateView'])->name('create.post');
        Route::post('/post/create', [PostController::class, 'submitPostCreateView'])->name('create.post');
        Route::get('/post/edit/{id}', [PostController::class, 'showPostEditView'])->name('edit.post');
        Route::post('/post/edit/{id}', [PostController::class, 'submitPostEdit'])->name('edit.post');
    });

    /**
     * Display Post Detail
     */
    Route::get('/post/detail/{id}',  [PostController::class, 'showPostDetailView'])->name('detail.post');

    /**
     * Feedback Create
     */
    Route::post('/post/feedback/{id}',  [FeedbackController::class, 'createFeedback'])->name('feedback.post');

    /**
     * Feedback Update
     */
    Route::get('/feedback/show/{id}', [FeedbackController::class, 'show']);
    Route::get('/feedback/update/{id}', [FeedbackController::class, 'updateFeedback']);

    /**
     * Feedback Delete
     */
    Route::get('/feedback/delete/{id}',  [FeedbackController::class, 'deleteFeedback'])->name('feedback.delete');

    /**
     * Add to Followed Category List
     */
    Route::get('user/favouriteCategory/{categoryid}', [CategoriesController::class, 'AddUserCategory'])->name('user.category');

    /**
     * Delete From Followed Category List
     */
    Route::get('user/favouriteCategory/delete/{categoryid}', [CategoriesController::class, 'DeleteUserCategory'])->name('user.category.delete');

    /**
     * Create reply for feedback 
     */
    Route::post('/post/{post}/feedback/{feedback}/reply',  [ReplyController::class, 'createReply'])->name("create.reply");

    /**
     * Edit reply for feedback 
     */
    Route::get('/show/{id}', [ReplyController::class, 'show']);
    Route::get('/update/{id}', [ReplyController::class, 'updatedReply'])->name('update.reply');

    /**
     * Delete reply  
     */
    Route::get('/reply/delete/{replyId}',  [ReplyController::class, 'deleteReply'])->name("delete.reply");
});
