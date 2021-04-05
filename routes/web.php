<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\HelloController;
use App\Http\Controllers\Admin\AdminNewsController;
use \App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/card/{id}', [NewsController::class, 'card'])
->where('id', '[0-9]+');
Route::get('/news/category/{name}', [NewsController::class, 'category'])
    ->where('name', '[a-z]+');
Route::get('/news/category/{name}/news', [NewsController::class, 'categoryNews'])
    ->where('name', '[a-z]+');

Route::get('/login', [LoginController::class, 'index']);

/** Админка новостей */
Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
], function () {
    Route::get('/', [AdminNewsController::class, 'index'] )
        ->name('index');
    Route::get('/create',[AdminNewsController::class, 'create'])
        ->name('create');
    Route::get('/update',[AdminNewsController::class, 'update'])
        ->name('update');
    Route::get('/delete',[AdminNewsController::class, 'delete'])
        ->name('delete');
});