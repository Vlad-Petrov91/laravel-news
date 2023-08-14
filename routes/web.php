<?php

use App\{Http\Controllers\Admin\CategoryController as AdminCategoryController,
    Http\Controllers\Admin\NewsController as AdminNewsController,
    Http\Controllers\Admin\UserController as AdminUserController,
    Http\Controllers\Category\CategoryController,
    Http\Controllers\HomeController,
    Http\Controllers\News\NewsController,
    Http\Controllers\User\ProfileController,
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->name('updateProfile')->middleware('auth');

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::resource('users', AdminUserController::class)->except('show');
        Route::resource('news', AdminNewsController::class)->except('show');
        Route::resource('category', AdminCategoryController::class)->except('show');
    });

//        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
//        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');


Route::name('news.')
    ->prefix('news')
    ->namespace('News')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/item/{news}', [NewsController::class, 'getNewsItem'])->name('newsItem');
        Route::name('category.')
            ->namespace('Category')
            ->group(function () {
                Route::get('/categories', [CategoryController::class, 'index'])->name('index');
                Route::get('/category/{slug}', [CategoryController::class, 'categoryNews'])->name('categoryNews');
            });
    });

//
//Route::name('category.')
//    ->prefix('category')
//    ->namespace('Category')
//    ->group(function () {
//        Route::get('/', [CategoryController::class, 'index'])->name('index');
//        Route::get('/{slug}', [CategoryController::class, 'categoryNews'])->name('categoryNews');
//    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
