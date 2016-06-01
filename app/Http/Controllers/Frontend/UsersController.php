<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;

use Input;
use Session;
use Validator;
use Auth;

class UsersController extends FrontendController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getLogin() {
		return view('frontend.users.login');
	}

	public function postLogin() {
		
	}

	public function getLogout() {
		return view('frontend.users.logout');
	}

	public function logout() {
		
	}
}