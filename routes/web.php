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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

// お問い合わせフォーム用
Route::get('/contact/create', 'ContactController@create')->name('contact.create');
Route::post('/contact/store', 'ContactController@store')->name('contact.store');

// ログインユーザー用
Route::middleware(['verified'])->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/post/comment/store', 'CommentController@store')->name('comment.store');
    Route::get('/post/{user}/mypost', 'HomeController@mypost')->name('home.mypost');
    Route::get('/post/mycomment/{user}', 'HomeController@mycomment')->name('home.mycomment');
    Route::resource('/post', 'PostController');

});


