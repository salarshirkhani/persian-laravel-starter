<?php

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

Route::get('/', 'FrontController@index')->name('index');
Route::get('items', 'FrontController@items')->name('items.index');

Auth::routes();

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->namespace('Dashboard')
    ->group(function() {
        Route::get('', 'IndexController@get')->name('index');

        Route::resource('conversations', 'ConversationController')->only(['index', 'show', 'store']);
        Route::post('conversations/{conversation}/messages', 'ConversationController@sendMessage')->name('sendMessage');

        Route::resource('plans', 'PlanController')->only(['index']);
        Route::post('plans/{plan}/subscribe', 'PlanController@subscribe')->name('plans.subscribe');
        Route::get('plans/callback/{transaction}', 'PlanController@callback')->name('plans.callback');

        Route::prefix('admin')
            ->name('admin.')
            ->middleware('user_type:admin')
            ->namespace('Admin')
            ->group(function() {
                Route::get('', 'IndexController@get')->name('index');

                Route::resource('slider-items', 'SliderItemController')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
            });

        Route::prefix('customer')
            ->name('customer.')
            ->middleware('user_type:customer')
            ->namespace('Customer')
            ->group(function() {
                Route::get('', 'IndexController@get')->name('index');
                Route::get('search', 'SearchController@search')->name('search');

                Route::resource('enquiries', 'EnquiryController')->only(['create', 'store']);
            });

        Route::prefix('owner')
            ->name('owner.')
            ->middleware('user_type:owner')
            ->namespace('Owner')
            ->group(function() {
                Route::get('', 'IndexController@get')->name('index');

                Route::resource('companies', 'CompanyController')->except('index');
                Route::resource('products', 'ProductController')->except('index');
                Route::resource('services', 'ServiceController')->except('index');
                Route::resource('enquiries', 'EnquiryController')->only(['index', 'show']);
            });
    });
