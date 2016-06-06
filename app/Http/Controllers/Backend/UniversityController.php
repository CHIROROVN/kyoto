<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\PresentModel;
use Input;
use Session;
use Validator;
use Auth;

class UniversityController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['title'] 			= '大学情報の検索結果一覧';

		return view('backend.universitys.index', $data);
	}

	public function search(){
		$data['title'] 			= '大学の検索';

		return view('backend.universitys.search', $data);
	}

	public function regist(){
		$data['title'] 			= '大学情報の新規登録';

		return view('backend.universitys.regist', $data);
	}

}