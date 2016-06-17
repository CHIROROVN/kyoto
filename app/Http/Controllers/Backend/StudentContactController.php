<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Input;
use Session;
use Validator;
use Auth;

class StudentContactController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['title'] 			= trans('common.stu_contact_title_index');

		return view('backend.students.contact.index', $data);
	}

	public function detail(){
		$data['title'] 			= trans('common.stu_contact_title_detail');

		return view('backend.students.contact.detail', $data);
	}

	public function getRegist(){
		$data['title'] 			= trans('common.stu_contact_title_regist');

		return view('backend.students.contact.regist', $data);
	}

	public function postRegist(){
		
	}

	public function deleteCnf(){
		$data['title'] 			= trans('common.stu_contact_title_del_cnf');

		return view('backend.students.contact.delete_cnf', $data);
	}

	public function delete(){
		$data['title'] 			= trans('common.stu_contact_title_del_cnf');

		return view('backend.students.contact.delete', $data);
	}

}