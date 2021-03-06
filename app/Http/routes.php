<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Public pages */
use App\Household;
use App\Task;
use App\User;

Route::get('/', ['as'   => 'public.landing', 'uses' => 'PublicController@showLandingPage']);
Route::get('/error', ['as' => 'public.error', 'uses' => 'PublicController@showErrorPage']);

/* Auth, Registration pages */
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function(){
	// Sign in routes
	Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
	Route::post('login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
	// Log out route
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
	// Registration routes
	Route::get('register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
	Route::post('register', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);
	Route::get('register/activate/{activationCode}', ['as' => 'register.activate', 'uses' => 'Auth\UserActivationController@activateAccount']);
});

/* Admin pages */
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
	// Dashboard
	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'Admin\AdminPagesController@getDashboard']);
});

/* Member pages */
Route::get('/home', ['as' => 'home', 'uses' => 'MemberPagesController@index']);
// Household pages
Route::resource('household', 'HouseholdsController');
Route::resource('household.member', 'HouseholdMembersController');
Route::resource('task', 'TasksController');

/* Test route */
Route::get('test', function(){
	$task = Task::find(1);

	dd($task->members()->attach([6, 2]));

});

/* Route Model Binding */
Route::model('household', App\Household::class);
Route::model('member', App\HouseholdMember::class);
Route::model('task', App\Task::class);