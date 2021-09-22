<?php

use Illuminate\Support\Facades\Route;

//use App\Http\Middleware\LoginCheck;
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

Route::get('login', function () {
    return view('login');
})->name('login');
Route::post('dologin', "adminController@dologin")->name('dologin');

Route::group(['middleware' => 'LoginCheck'], function () {

    Route::get('show', "adminController@show")->name('show');
    Route::get('admin_list', "personController@admin_list")->name('admin_list');
    Route::get('welcome', "personController@welcome")->name('welcome');
    Route::get('exit', "adminController@exits")->name('exit');
    Route::get('getAdminInfo', "adminController@getAdminInfo")->name('getAdminInfo');
    Route::get('permission', function () {
        return view('admin-permission');
    })->name('permission');

    Route::get('article_list', "ArticleController@article_list")->name('article_list');
    Route::get('article_add', "ArticleController@article_add")->name('article_add');
    Route::get('putaway', "ArticleController@putaway")->name('putaway');
    Route::get('puton', "ArticleController@puton")->name('puton');
    Route::get('delOne', "ArticleController@delOne")->name('delOne');

    Route::get('index', 'FrontController@index')->name('index');
    Route::get('articleDetail', 'FrontController@articleDetail')->name('articleDetail');


});



