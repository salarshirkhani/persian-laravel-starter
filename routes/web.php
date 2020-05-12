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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->namespace('Dashboard')
    ->group(function() {
        Route::get('', 'IndexController@get')->name('index');

        Route::prefix('admin')
            ->name('admin.')
            ->middleware('user_type:admin')
            ->namespace('Admin')
            ->group(function() {
                Route::get('', 'IndexController@get')->name('index');
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
