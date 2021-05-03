<?php

use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\LocaleController;
use \App\Http\Controllers\Admin\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Новости
 */
Route::group([
    'prefix' => 'news',
    'as' => 'news::'
], function() {

    Route::get('/', [NewsController::class, 'index'])
        ->name("categories");

    Route::get('/card/{news}', [NewsController::class, 'card'])
        ->where('news', '[0-9]+')
        ->name('card');

    Route::get('/{categoryId}', [NewsController::class, 'list'])
        ->where('categoryId', '[0-9]+')
        ->name('list');
});

Route::get('/db', [\App\Http\Controllers\DbController::class, 'index']);


/**
 * Админка новостей
 */
$adminNewsRoutes = function () {
    Route::group([
        'prefix' => '/news',
        'as' => 'news::',
    ], function () {
        Route::get('/', 'NewsController@index')
            ->name('index');

        Route::match(['get'], '/create', 'NewsController@create')
            ->name('create');

        Route::match(['post'], '/save', 'NewsController@save')
            ->name('save');

        Route::get('/update/{id}', 'NewsController@update')
            ->name('update');

        Route::get('/delete/{id}', 'NewsController@delete')
            ->name('delete');
    });
};

/**
 * Админка
 */
Route::group([
    'prefix' => 'admin/',
    'namespace' => '\App\Http\Controllers\Admin',
    'as' => 'admin::',
    'middleware' => ['auth', 'check_admin']
], function () use ($adminNewsRoutes) {
    $adminNewsRoutes();
    //Профиль
    Route::group([
        'prefix' => 'profile',
        'as' => 'profile::',
    ], function () {
        Route::post('update', 'ProfileController@update',
        )->name('update');

        Route::get('show', 'ProfileController@show',
        )->name('show');
    });

    //Parser
    Route::get("parser", [ParserController::class, 'index'])
        ->name('parser');
});

Route::group([
    'prefix' => 'social',
    'as' => 'social::',
], function () {
    Route::get('/login', [SocialController::class, 'loginVk'])
        ->name('login-vk');
    Route::get('/response', [SocialController::class, 'responseVk'])
        ->name('response-vk');
});

Route::get('/locale/{lang}', [LocaleController::class, 'index'])
    ->where('lang','\w+')
    ->name('locale');


Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
