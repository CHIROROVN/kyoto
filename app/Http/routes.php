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



/**
 * sys-adm
 */
Route::group(['prefix' => 'sys-adm', 'namespace' => 'Backend'], function () 
{
	Route::get('/', function () {
        return redirect()->route('backend.menus');
    });

	/**
	 * menu
	 */
	Route::get('menu', ['as' => 'backend.menu', 'uses' => 'MenuController@index']);

	// user. Using onl add new account admin
	// Route::get('users', ['as' => 'admin.users.index', 'uses' => 'UserController@index']);

	/**
	 * presents
	*/
	Route::get('presents', ['as' => 'backend.presents.index', 'uses' => 'PresentController@index']);
	Route::get('presents/regist', ['as' => 'backend.presents.regist', 'uses' => 'PresentController@getRegist']);
	Route::post('presents/regist', ['as' => 'backend.presents.regist', 'uses' => 'PresentController@postRegist']);
	Route::get('presents/edit/{id}', ['as' => 'backend.presents.edit', 'uses' => 'PresentController@getEdit']);
	Route::post('presents/edit/{id}', ['as' => 'backend.presents.edit', 'uses' => 'PresentController@postEdit']);
	Route::get('presents/delete/{id}', ['as' => 'backend.presents.delete', 'uses' => 'PresentController@delete']);


	/**
	 * bunya
	*/
	Route::get('bunyas', ['as' => 'backend.bunyas.index', 'uses' => 'BunyaController@index']);
	Route::get('bunyas/regist', ['as' => 'backend.bunyas.regist', 'uses' => 'BunyaController@getRegist']);
	Route::post('bunyas/regist', ['as' => 'backend.bunyas.regist', 'uses' => 'BunyaController@postRegist']);
	Route::get('bunyas/edit/{id}', ['as' => 'backend.bunyas.edit', 'uses' => 'BunyaController@getEdit']);
	Route::post('bunyas/edit/{id}', ['as' => 'backend.bunyas.edit', 'uses' => 'BunyaController@postEdit']);
	Route::get('bunyas/delete/{id}', ['as' => 'backend.bunyas.delete', 'uses' => 'BunyaController@delete']);
	Route::get('bunyas/search', ['as' => 'backend.bunyas.search', 'uses' => 'BunyaController@search']);


	/**
	 * auth
	*/
	Route::get('login', ['as' => 'backend.login', 'uses' => 'AuthController@getLogin']);
	Route::post('login', ['as' => 'backend.login', 'uses' => 'AuthController@postLogin']);
	Route::get('logout', ['as' => 'backend.logout', 'uses' => 'AuthController@logout']);

	/**
	 * Users
	*/
	Route::get('users', ['as' => 'backend.users.index', 'uses' => 'UsersController@index']);
	Route::get('change_passwd', ['as' => 'backend.users.change_passwd', 'uses' => 'UsersController@getChangePasswd']);
	Route::post('change_passwd', ['as' => 'backend.users.change_passwd', 'uses' => 'UsersController@ChangePasswd']);

});

Route::group(['prefix' => '4school', 'namespace' => 'Frontend'], function () 
{
	Route::get('login', ['as' => 'frontend.users.login', 'uses' => 'UsersController@getLogin']);
	Route::post('login', ['as' => 'frontend.users.login', 'uses' => 'UsersController@postLogin']);
	Route::get('logout', ['as' => 'frontend.users.logout', 'uses' => 'UsersController@getLogout']);
	Route::get('change_passwd', ['as' => 'frontend.users.change_passwd', 'uses' => 'UsersController@getChangePasswd']);
	Route::get('customers/detail', ['as' => 'frontend.customer.detail', 'uses' => 'CustomersController@detail']);

	Route::get('/', ['as' => 'frontend.index', 'uses' => 'HomeController@index']);
});

Route::get('/', function () {
        return redirect()->to('4school');
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
