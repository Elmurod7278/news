<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsTagController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TanlovController;
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
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index']);


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/', function () {
        return view('partials.body');
    })->name('home');
    Auth::routes();

    Route::resource('category', CategoryController::class);
    Route::get('catser', [CategoryController::class, 'catser'])->name('catser');
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
