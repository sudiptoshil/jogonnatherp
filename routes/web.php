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

Auth::routes();

Route::group(['middleware' => ['adminmiddleware']], function () {
    Route::get('/admin/create-admin', 'Admin\AdminController@create_admin')->name('create-admin');
    Route::post('/admin/create-admin', 'Admin\AdminController@save_admin')->name('save-admin');
    Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('dashboard');
    Route::get('/admin/logout', 'Admin\AdminController@logout')->name('admin-logout');
    Route::get('/admin/manage-admin', 'Admin\AdminController@manage_admin')->name('manage-admin');
    Route::get('/admin/active-admin/{id}', 'Admin\AdminController@active')->name('admin-active');
    Route::get('/admin/deactive-admin/{id}', 'Admin\AdminController@deactive')->name('admin-deactive');
    Route::get('/admin/password-reset', 'Admin\AdminController@password_reset')->name('password-reset');
    Route::post('/admin/password-reset', 'Admin\AdminController@update_password')->name('update-password');
    // for creating bookstall user...........
    Route::get('/admin/create-bookstall-user', 'Admin\AdminController@bookstall_user')->name('bookstall-user');
    Route::post('/admin/create-bookstall-user', 'Admin\AdminController@save_bookstall_user')->name('save-bookstall-user');
    Route::get('/admin/active-bookstall-user/{id}', 'Admin\AdminController@bookstall_active')->name('bookstall-active');
    Route::get('/admin/deactive-bookstall-user/{id}', 'Admin\AdminController@bookstall_deactive')->name('bookstall-deactive');
    Route::get('/admin/manage-bookstall-user', 'Admin\AdminController@manage_bookstall_user')->name('manage-bookstall');  
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login', 'Admin\AdminController@login')->name('admin-login');
Route::post('/admin/login', 'Admin\AdminController@login_process')->name('admin-login-process');

// for bookstall part .....
Route::group(['middleware' => ['bookstallmiddleware']], function () {
    Route::get('/bookstall/dashboard', 'Bookstall\BookstallController@index')->name('bookstall-dashboard');
    Route::get('/bookstall/logout', 'Bookstall\BookstallController@logout')->name('bookstall-logout');
});
// for bookstall login
Route::get('/bookstall/login', 'Bookstall\BookstallController@login')->name('bookstall-login');
Route::post('/bookstall/login', 'Bookstall\BookstallController@login_process')->name('bookstall-login-process');



