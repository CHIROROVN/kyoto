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

	/**
	 * presents
	*/
	Route::get('presents', ['middleware' => 'permission_admin', 'as' => 'backend.presents.index', 'uses' => 'PresentController@index']);
	Route::get('presents/regist', ['middleware' => 'permission_admin', 'as' => 'backend.presents.regist', 'uses' => 'PresentController@getRegist']);
	Route::post('presents/regist', ['middleware' => 'permission_admin', 'as' => 'backend.presents.regist', 'uses' => 'PresentController@postRegist']);
	Route::get('presents/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.presents.edit', 'uses' => 'PresentController@getEdit']);
	Route::post('presents/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.presents.edit', 'uses' => 'PresentController@postEdit']);
	Route::get('presents/delete/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.presents.delete', 'uses' => 'PresentController@delete']);


	/**
	 * bunya
	*/
	Route::get('bunyas', ['middleware' => 'permission_admin', 'as' => 'backend.bunyas.index', 'uses' => 'BunyaController@index']);
	Route::get('bunyas/regist', ['middleware' => 'permission_admin', 'as' => 'backend.bunyas.regist', 'uses' => 'BunyaController@getRegist']);
	Route::post('bunyas/regist', ['middleware' => 'permission_admin', 'as' => 'backend.bunyas.regist', 'uses' => 'BunyaController@postRegist']);
	Route::get('bunyas/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.bunyas.edit', 'uses' => 'BunyaController@getEdit']);
	Route::post('bunyas/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.bunyas.edit', 'uses' => 'BunyaController@postEdit']);
	Route::get('bunyas/delete/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.bunyas.delete', 'uses' => 'BunyaController@delete']);
	Route::get('bunyas/search', ['middleware' => 'permission_admin', 'as' => 'backend.bunyas.search', 'uses' => 'BunyaController@search']);


	/**
	 * baitai
	 */
	Route::get('baitais', ['middleware' => 'permission_admin', 'as' => 'backend.baitais.index', 'uses' => 'BaitaiController@index']);
	Route::get('baitais/regist', ['middleware' => 'permission_admin', 'as' => 'backend.baitais.regist', 'uses' => 'BaitaiController@getRegist']);
	Route::post('baitais/regist', ['middleware' => 'permission_admin', 'as' => 'backend.baitais.regist', 'uses' => 'BaitaiController@postRegist']);
	Route::get('baitais/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.baitais.edit', 'uses' => 'BaitaiController@getEdit']);
	Route::post('baitais/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.baitais.edit', 'uses' => 'BaitaiController@postEdit']);
	Route::get('baitais/delete/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.baitais.delete', 'uses' => 'BaitaiController@delete']);
	Route::get('baitais/search', ['middleware' => 'permission_admin', 'as' => 'backend.baitais.search', 'uses' => 'BaitaiController@search']);


	/**
	 * campaigns
	 */
	Route::get('campaigns', ['middleware' => 'permission_admin', 'as' => 'backend.campaigns.index', 'uses' => 'CampaignController@index']);
	Route::get('campaigns/regist', ['middleware' => 'permission_admin', 'as' => 'backend.campaigns.regist', 'uses' => 'CampaignController@getRegist']);
	Route::post('campaigns/regist', ['middleware' => 'permission_admin', 'as' => 'backend.campaigns.regist', 'uses' => 'CampaignController@postRegist']);
	Route::get('campaigns/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.campaigns.edit', 'uses' => 'CampaignController@getEdit']);
	Route::post('campaigns/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.campaigns.edit', 'uses' => 'CampaignController@postEdit']);
	Route::get('campaigns/delete/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.campaigns.delete', 'uses' => 'CampaignController@delete']);


	/**
	 * pamphlets
	 */
	Route::get('pamphlets', ['middleware' => 'permission_admin', 'as' => 'backend.pamphlets.index', 'uses' => 'PamphletController@index']);
	Route::get('pamphlets/regist', ['middleware' => 'permission_admin', 'as' => 'backend.pamphlets.regist', 'uses' => 'PamphletController@getRegist']);
	Route::post('pamphlets/regist', ['middleware' => 'permission_admin', 'as' => 'backend.pamphlets.regist', 'uses' => 'PamphletController@postRegist']);
	Route::get('pamphlets/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.pamphlets.edit', 'uses' => 'PamphletController@getEdit']);
	Route::post('pamphlets/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.pamphlets.edit', 'uses' => 'PamphletController@postEdit']);
	Route::get('pamphlets/delete/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.pamphlets.delete', 'uses' => 'PamphletController@delete']);
	Route::get('pamphlets/search', ['middleware' => 'permission_admin', 'as' => 'backend.pamphlets.search', 'uses' => 'PamphletController@search']);


	/**
	 * gpamphlets
	 */
	Route::get('gpamphlets', ['middleware' => 'permission_admin', 'as' => 'backend.gpamphlets.index', 'uses' => 'GPamphletController@index']);
	Route::get('gpamphlets/regist', ['middleware' => 'permission_admin', 'as' => 'backend.gpamphlets.regist', 'uses' => 'GPamphletController@getRegist']);
	Route::post('gpamphlets/regist', ['middleware' => 'permission_admin', 'as' => 'backend.gpamphlets.regist', 'uses' => 'GPamphletController@postRegist']);
	Route::get('gpamphlets/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.gpamphlets.edit', 'uses' => 'GPamphletController@getEdit']);
	Route::post('gpamphlets/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.gpamphlets.edit', 'uses' => 'GPamphletController@postEdit']);
	Route::get('gpamphlets/delete/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.gpamphlets.delete', 'uses' => 'GPamphletController@delete']);
	Route::get('gpamphlets/search', ['middleware' => 'permission_admin', 'as' => 'backend.gpamphlets.search', 'uses' => 'GPamphletController@search']);


	/**
	 * enterprises
	 */
	Route::get('enterprises', ['middleware' => 'permission_admin', 'as' => 'backend.enterprises.index', 'uses' => 'EnterpriseController@index']);
	Route::get('enterprises/regist', ['middleware' => 'permission_admin', 'as' => 'backend.enterprises.regist', 'uses' => 'EnterpriseController@getRegist']);
	Route::post('enterprises/regist', ['middleware' => 'permission_admin', 'as' => 'backend.enterprises.regist', 'uses' => 'EnterpriseController@postRegist']);
	Route::get('enterprises/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.enterprises.edit', 'uses' => 'EnterpriseController@getEdit']);
	Route::post('enterprises/edit/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.enterprises.edit', 'uses' => 'EnterpriseController@postEdit']);

	Route::get('enterprises/delete/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.enterprises.delete', 'uses' => 'EnterpriseController@delete']);

	Route::get('enterprises/search', ['middleware' => 'permission_member', 'as' => 'backend.enterprises.search', 'uses' => 'EnterpriseController@search']);

	Route::post('enterprises/search', ['middleware' => 'permission_member', 'as' => 'backend.enterprises.search', 'uses' => 'EnterpriseController@postSearch']);

	Route::get('enterprises/detail/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.enterprises.detail', 'uses' => 'EnterpriseController@detail']);
	
	Route::post('enterprise/regist/cnk_ajax', ['as' => 'backend.enterprise.cnk_ajax', 'uses' => 'EnterpriseController@getCusNameAjax']);

	/**
	 * customers
	 */
	Route::get('customers', ['as' => 'backend.customers.index', 'uses' => 'CustomerController@index']);
	Route::get('customers/regist', ['as' => 'backend.customers.regist', 'uses' => 'CustomerController@getRegist']);
	Route::post('customers/regist', ['as' => 'backend.customers.regist', 'uses' => 'CustomerController@postRegist']);
	Route::get('customers/edit/{id}', ['as' => 'backend.customers.edit', 'uses' => 'CustomerController@getEdit']);
	Route::post('customers/edit/{id}', ['as' => 'backend.customers.edit', 'uses' => 'CustomerController@postEdit']);
	Route::get('customers/delete/{id}', ['as' => 'backend.customers.delete', 'uses' => 'CustomerController@delete']);
	Route::get('customers/search', ['as' => 'backend.customers.search', 'uses' => 'CustomerController@search']);
	Route::post('customers/search', ['as' => 'backend.customers.search', 'uses' => 'CustomerController@postSearch']);
	Route::get('customers/detail/{id}', ['as' => 'backend.customers.detail', 'uses' => 'CustomerController@detail']);


	/**
	 * auth
	*/
	Route::get('login', ['as' => 'backend.login', 'uses' => 'AuthController@getLogin']);
	Route::post('login', ['as' => 'backend.login', 'uses' => 'AuthController@postLogin']);
	Route::get('logout', ['as' => 'backend.logout', 'uses' => 'AuthController@logout']);

	/**
	 * Users
	*/
	Route::get('users', ['middleware' => 'permission_admin', 'as' => 'backend.users.index', 'uses' => 'UsersController@index']);
	Route::get('users/regist', ['middleware' => 'permission_admin', 'as' => 'backend.users.regist', 'uses' => 'UsersController@getRegist']);
	Route::post('users/regist', ['middleware' => 'permission_admin', 'as' => 'backend.users.regist', 'uses' => 'UsersController@postRegist']);
	Route::get('users/update/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.users.update', 'uses' => 'UsersController@getUpdate']);
	Route::post('users/update/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.users.update', 'uses' => 'UsersController@postUpdate']);
	Route::get('users/delete/{id}', ['middleware' => 'permission_admin', 'as' => 'backend.users.delete', 'uses' => 'UsersController@delete']);
	
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



