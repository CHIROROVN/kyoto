<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\PresentModel;
use Input;
use Session;
use Validator;
use Auth;

class MenuController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index() {
		$title = 'メニュー';
		return view('backend.menu.index', compact('title'));
	}
}