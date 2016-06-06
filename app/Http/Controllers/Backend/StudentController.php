<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\PresentModel;
use Input;
use Session;
use Validator;
use Auth;

class StudentController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['title'] 			= '個人情報の検索結果一覧';

		return view('backend.students.index', $data);
	}

	public function search(){
		$data['title'] 			= '個人情報の検索';

		return view('backend.students.search', $data);
	}
}