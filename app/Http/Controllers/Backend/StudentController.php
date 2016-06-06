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

    /************************************************************************
    * get student index
    /************************************************************************/
	public function index(){
		$data['title'] 			= '個人情報の検索結果一覧';

		return view('backend.students.index', $data);
	}

	/************************************************************************
    * get student search
    /************************************************************************/
	public function search(){
		$data['title'] 			= '個人情報の検索';

		return view('backend.students.search', $data);
	}

	/************************************************************************
    * get student regist
    /************************************************************************/
	public function regist(){
		$data['title'] 			= '個人情報の新規登録';

		return view('backend.students.regist', $data);
	}

	/************************************************************************
    * get student detail
    /************************************************************************/
	public function detail(){
		$data['title'] 			= '登録済み個人情報の参照';

		return view('backend.students.detail', $data);
	}

	/************************************************************************
    * get student update
    /************************************************************************/
	public function getUpdate(){
		$data['title'] 			= '登録済み個人情報の編集';

		return view('backend.students.update', $data);
	}

	/************************************************************************
    * get student delete confirm
    /************************************************************************/
	public function deleteCnf(){
		$data['title'] 			= '登録済み個人情報の削除';

		return view('backend.students.delete_cnf', $data);
	}

	/************************************************************************
    * get student delete
    /************************************************************************/
	public function delete(){
		
	}
}