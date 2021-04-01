<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;


Route::get('/', function () {
    return view('welcome');
});

/**
 * Новости
 */
Route::get('/news', [NewsController::class, 'index'])
    ->name("news::catalog");
//Route::get('/news', '\App\Http\Controllers\NewsController@index');
Route::get('/news/{id}', [NewsController::class, 'card'])
    ->where('id', '[0-9]+')
    ->name('news::card');

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

