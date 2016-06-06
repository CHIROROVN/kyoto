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
	 * baitai
	 */
	Route::get('baitais', ['as' => 'backend.baitais.index', 'uses' => 'BaitaiController@index']);
	Route::get('baitais/regist', ['as' => 'backend.baitais.regist', 'uses' => 'BaitaiController@getRegist']);
	Route::post('baitais/regist', ['as' => 'backend.baitais.regist', 'uses' => 'BaitaiController@postRegist']);
	Route::get('baitais/edit/{id}', ['as' => 'backend.baitais.edit', 'uses' => 'BaitaiController@getEdit']);
	Route::post('baitais/edit/{id}', ['as' => 'backend.baitais.edit', 'uses' => 'BaitaiController@postEdit']);
	Route::get('baitais/delete/{id}', ['as' => 'backend.baitais.delete', 'uses' => 'BaitaiController@delete']);
	Route::get('baitais/search', ['as' => 'backend.baitais.search', 'uses' => 'BaitaiController@search']);


	/**
	 * campaigns
	 */
	Route::get('campaigns', ['as' => 'backend.campaigns.index', 'uses' => 'CampaignController@index']);
	Route::get('campaigns/regist', ['as' => 'backend.campaigns.regist', 'uses' => 'CampaignController@getRegist']);
	Route::post('campaigns/regist', ['as' => 'backend.campaigns.regist', 'uses' => 'CampaignController@postRegist']);
	Route::get('campaigns/edit/{id}', ['as' => 'backend.campaigns.edit', 'uses' => 'CampaignController@getEdit']);
	Route::post('campaigns/edit/{id}', ['as' => 'backend.campaigns.edit', 'uses' => 'CampaignController@postEdit']);
	Route::get('campaigns/delete/{id}', ['as' => 'backend.campaigns.delete', 'uses' => 'CampaignController@delete']);
	Route::get('campaigns/search', ['as' => 'backend.campaigns.search', 'uses' => 'CampaignController@search']);


	/**
	 * enterprises
	 */
	Route::get('enterprises', ['as' => 'backend.enterprises.index', 'uses' => 'EnterpriseController@index']);
	Route::get('enterprises/regist', ['as' => 'backend.enterprises.regist', 'uses' => 'EnterpriseController@getRegist']);
	Route::post('enterprises/regist', ['as' => 'backend.enterprises.regist', 'uses' => 'EnterpriseController@postRegist']);
	Route::get('enterprises/edit/{id}', ['as' => 'backend.enterprises.edit', 'uses' => 'EnterpriseController@getEdit']);
	Route::post('enterprises/edit/{id}', ['as' => 'backend.enterprises.edit', 'uses' => 'EnterpriseController@postEdit']);
	Route::get('enterprises/delete/{id}', ['as' => 'backend.enterprises.delete', 'uses' => 'EnterpriseController@delete']);
	Route::get('enterprises/search', ['as' => 'backend.enterprises.search', 'uses' => 'EnterpriseController@search']);


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
	Route::get('users/regist', ['as' => 'backend.users.regist', 'uses' => 'UsersController@getRegist']);
	Route::post('users/regist', ['as' => 'backend.users.regist', 'uses' => 'UsersController@postRegist']);
	Route::get('users/update/{id}', ['as' => 'backend.users.update', 'uses' => 'UsersController@getUpdate']);
	Route::post('users/update/{id}', ['as' => 'backend.users.update', 'uses' => 'UsersController@postUpdate']);
	Route::get('users/delete/{id}', ['as' => 'backend.users.delete', 'uses' => 'UsersController@delete']);
	
	Route::get('change_passwd', ['as' => 'backend.users.change_passwd', 'uses' => 'UsersController@getChangePasswd']);
	Route::post('change_passwd', ['as' => 'backend.users.change_passwd', 'uses' => 'UsersController@ChangePasswd']);

	/**
	 * Students
	*/
	Route::get('student/search', ['as' => 'backend.students.search', 'uses' => 'StudentController@search']);
	Route::get('student', ['as' => 'backend.students.index', 'uses' => 'StudentController@index']);
	Route::get('student/regist', ['as' => 'backend.students.regist', 'uses' => 'StudentController@regist']);
	Route::get('student/update', ['as' => 'backend.students.update', 'uses' => 'StudentController@getUpdate']);
	Route::post('student/update', ['as' => 'backend.students.update', 'uses' => 'StudentController@postUpdate']);
	Route::get('student/detail/{?id}', ['as' => 'backend.students.detail', 'uses' => 'StudentController@detail']);

	Route::get('student/detail', ['as' => 'backend.students.detail', 'uses' => 'StudentController@detail']);

	Route::get('student/delete', ['as' => 'backend.students.delete', 'uses' => 'StudentController@delete']);

	Route::get('student/delete_cnf', ['as' => 'backend.students.delete_cnf', 'uses' => 'StudentController@deleteCnf']);


	/**
	 * Students present 
	*/
	Route::get('student/present', ['as' => 'backend.students.present_index', 'uses' => 'StudentController@presentIndex']);
	Route::get('student/present_regist', ['as' => 'backend.students.present_regist', 'uses' => 'StudentController@getPresentRegist']);
	Route::post('student/present_regist', ['as' => 'backend.students.present_regist', 'uses' => 'StudentController@postPresentRegist']);
	Route::get('students/present_update', ['as' => 'backend.students.present_update', 'uses' => 'StudentController@getPresentUpdate']);
	Route::post('student/present_update', ['as' => 'backend.students.present_update', 'uses' => 'StudentController@postPresentUpdate']);

	/**
	 * University
	*/
	Route::get('university', ['as' => 'backend.unyversitys.index', 'uses' => 'UniversityController@index']);
	Route::get('university/regist', ['as' => 'backend.unyversitys.regist', 'uses' => 'UniversityController@regist']);
	Route::get('university/search', ['as' => 'backend.unyversitys.search', 'uses' => 'UniversityController@search']);

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
