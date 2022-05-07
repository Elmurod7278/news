<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsTagController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TanlovController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('', [SiteController::class, 'index'])->name('home');
Route::get('views/{news}', [SiteController::class, 'views'])->name('news.view');
Route::get('views/{latestNew}', [SiteController::class, 'latestNew'])->name('latestNew.view');


    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'name' => 'admin.', 'middleware' => ['auth']], function () {
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::resource('category', CategoryController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('tag', TagController::class);
    Route::resource('tanlov', TanlovController::class);
    Route::resource('news', NewsController::class);
    Route::resource('advertises', AdvertiseController::class);
    Route::resource('Newstags', NewsTagController::class);
    Route::post('news-add-tag/{news}', [NewsController::class, 'addTag'])->name('news-add-tag');
    Route::delete('del/{tag}', [NewsController::class, 'del'])->name('del');
    Route::post('tanlov/{news}', [NewsController::class, 'tanlov'])->name('tanlov');

});


