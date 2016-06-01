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

Route::get('/', function () {
    return view('welcome');
});



/**
 * sys-adm
 */
Route::group(['prefix' => 'sys-adm', 'namespace' => 'Backend'], function () 
{
	Route::get('/', function () {
        return redirect()->route('backend.menus');
    });

	// menu
	Route::get('menu', ['as' => 'backend.menu', 'uses' => 'MenuController@index']);

	// user. Using onl add new account admin
	// Route::get('users', ['as' => 'admin.users.index', 'uses' => 'UserController@index']);

	// presents
	Route::get('presents', ['as' => 'backend.presents.index', 'uses' => 'PresentController@index']);
	Route::get('presents/regist', ['as' => 'backend.presents.regist', 'uses' => 'PresentController@getRegist']);
	Route::post('presents/regist', ['as' => 'backend.presents.regist', 'uses' => 'PresentController@postRegist']);
	Route::get('presents/edit/{id}', ['as' => 'backend.presents.edit', 'uses' => 'PresentController@getEdit']);
	Route::post('presents/edit/{id}', ['as' => 'backend.presents.edit', 'uses' => 'PresentController@postEdit']);
	Route::get('presents/delete/{id}', ['as' => 'backend.presents.delete', 'uses' => 'PresentController@delete']);


	/**
	 * auth
	 */
	Route::get('login', ['as' => 'backend.login', 'uses' => 'AuthController@getLogin']);
	Route::post('login', ['as' => 'backend.login', 'uses' => 'AuthController@postLogin']);
	Route::get('logout', ['as' => 'backend.logout', 'uses' => 'AuthController@logout']);
});


Route::get('sys-adm', function () {
        return redirect()->to('sys-adm/login');
    });
Route::get('auth/login', function () {
        return redirect()->to('sys-adm/login');
    });
Route::get('auth/logout', function () {
        return redirect()->to('sys-adm/logout');
    });