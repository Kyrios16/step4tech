<?php

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
    return view('admin.categories-manage');
});

Route::get('/admin/categories/list', [CategoriesController::class, 'getCateList'])->name('show.cates');
Route::post('/admin/categories/create', [CategoriesController::class, 'getCateCreate'])->name('add.cate');
