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

/////////////// Users /////////////////

// Register Routes 
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register/create', 'Auth\RegisterController@register');
// End Register routes


//  Login routes

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//end Login routes

// Update Password routes
Route::get('/profile/password-edit', 'ChangePasswordController@viewPassword')->name('profile.edit.password');
Route::post('/profile/password-edit', 'ChangePasswordController@updatePassword')->name('profile.update.password');

// end update password routes


// profile users routes
Route::get('/profile', 'UserController@index')->name('profile');
Route::get('/profile/edit', 'UserController@showEditForm')->name('profile.edit');
Route::post('/profile/edit/{id}', 'UserController@updateProfile')->name('profile.update');
// end profile users routes


/////////////// End Users /////////////////


/////////////////// ADMIN ////////////////////


    // Authentication routes
    Route::get('/admin', 'Auth\AdminauthController@index')->name('admin.login');
    Route::post('admin/login','Auth\AdminauthController@checkloginadmin')->name('admin.login.check');
    Route::post('/logout/admin', 'Auth\AdminauthController@logout')->name('admin.logout');
    // end Authentication

    // Admin Routes Group
Route::group(['middleware' => 'auth:admin'], function() {

    Route::get('/admin/users', 'AdminController@showUserList')->name('admin.users');
    Route::get('/admin/users/{id}', 'AdminController@showUserProfile')->name('admin.users.show');
    Route::get('/admin/users/edit/{id}', 'AdminController@showUserEditForm')->name('admin.users.edit');
    Route::post('/admin/users/edit/{id}', 'AdminController@updateUserProfile')->name('admin.users.update');
    Route::get('/admin/register/FormEditUser', 'AdminController@showRegistrationForm')->name('admin.register.user');
    Route::post('/admin/register/user', 'AdminController@create')->name('admin.register');

    // Audit Trail routes
    Route::get('/admin/users/audit/showall', 'AdminController@showUsersAudit')->name('admin.users.showaudit');
    Route::get('/admin/users/audit/{id}', 'AdminController@showUserAudit')->name('admin.users.audit');
    // end Audit Trail routes


});

   // End Admin Routes Group




//////////////////////////// end ADMIN /////////////////


// Laravel default Authentication routes

Auth::routes();

