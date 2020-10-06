<?php

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

// Auth::routes();

Route::group(['middleware' => ['web']], function() {
    // //Authentication Routes
    // Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
	// Route::post('auth/login', 'Auth\AuthController@postLogin');
	// Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

    // //Registration Routes
    // Route::get('auth/register', 'Auth\AuthController@getRegister');
    // Route::post('auth/register', 'Auth\AuthController@postRegister');
    
    Route::get('blog/{slug}', [ 'as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
    Route::get('blog', array('uses' => 'BlogController@getIndex', 'as' => 'blog.index'));
    Route::get('/about', 'PagesController@getAbout');
    Route::get('/contact', 'PagesController@getContact');
    Route::get('/', 'PagesController@getIndex');
    Route::resource('posts', 'PostController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

