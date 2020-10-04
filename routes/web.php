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
    return view('auth.login');
});

Auth::routes();

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
})->name("register");

Route::group(['prefix' => '/','middleware'=>'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::resource('users', 'UserController');
    
    Route::group(['prefix' => '/categories'], function () {
        Route::get('/trash', 'CategoryController@trash')->name('categories.trash');
        Route::post('/{id}/restore', 'CategoryController@restore')->name('categories.restore');
        Route::delete('/{category}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent');
    });
    Route::resource('/categories', 'CategoryController');
    
    Route::group(['prefix' => '/books'], function () {
        Route::get('/trash', 'BookController@trash')->name('books.trash');
        Route::post('/{book}/restore', 'BookController@restore')->name('books.restore');
        Route::delete('/{id}/delete-permanent', 'BookController@deletePermanent')->name('books.delete-permanent');
    });
    Route::resource('/books', 'BookController');
    
    Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch')->name('categories.search');    
});



