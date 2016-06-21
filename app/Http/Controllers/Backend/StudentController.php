<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\PersonalModel;
use Input;
use Session;
use Validator;
use Auth;

// Personal = Student
class StudentController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * show list students
	 */
	public function index(){
		$data['title'] 			= trans('common.student_title_index');

		return view('backend.students.infomation.index', $data);
	}


	/**
	 * get view regist
	 */
	public function getRegist(){
		$data['title'] 			= trans('common.student_title_regist');

		return view('backend.students.infomation.regist', $data);
	}


	/**
	 * insert to database TABLE t_personal, t_brochure_history, t_orderpresent
	 */
	public function postRegist(){
		// echo '<pre>';
		// print_r(Input::all());
		// echo '</pre>';die;

		$clsPersonal             	= new PersonalModel();
		$dataInsert             	= array(
			'per_id'      			=> Input::get('per_id'),
			'baitai_id'      		=> Input::get('baitai_id'),
			'per_fname'      		=> Input::get('per_fname'),
			'per_gname'      		=> Input::get('per_gname'),
			'per_fname_kana'      	=> Input::get('per_fname_kana'),
			'per_gname_kana'      	=> Input::get('per_gname_kana'),
			'per_way'      			=> Input::get('per_way'),
			'per_phone'      		=> Input::get('per_phone'),
			'per_email'      		=> Input::get('per_email'),
			'per_sex'      			=> Input::get('per_sex'),
			'per_zipcode'      		=> Input::get('per_zipcode'),
			'pref_code'      		=> Input::get('pref_code'),
			'per_address1'      	=> Input::get('per_address1'),
			'per_address2'      	=> Input::get('per_address2'),
			'per_address3'      	=> Input::get('per_address3'),
			'per_birthday'      	=> Input::get('per_birthday_year') . '-' . Input::get('per_birthday_month') . '-' . Input::get('per_birthday_day'),
			'fst_date'				=> date('Y-m-d H:i:s'),
			'per_status'			=> (Input::get('regist')) ? 1 : 0,

			'per_pref_code'			=> '',
			'per_grade'				=> '',
			'per_hs_id'				=> '',
			'per_univ_id'			=> '',

			'last_date'         	=> date('Y-m-d H:i:s'),
			'last_kind'         	=> INSERT,
			'last_ipadrs'       	=> CLIENT_IP_ADRS,
			'last_user'         	=> (Auth::check()) ? Auth::user()->u_id : 0,
		);

		$validator  = Validator::make($dataInsert, $clsPersonal->Rules(), $clsPersonal->Messages());
		if ($validator->fails()) {
			return redirect()->route('backend.students.regist')->withErrors($validator)->withInput();
		}

		unset($dataInsert['baitai_id']);
		// insert to table t_personal
		if ( $clsPersonal->insert($dataInsert) ) {
			Session::flash('success', trans('common.message_regist_success'));
		} else {
			Session::flash('danger', trans('common.message_regist_danger'));
		}

		// insert to table t_brochure_history

		// insert to table t_orderpresent

		// $dataInsert['pamph_id'] = Input::get('pamph_id_1');

		return redirect()->route('backend.students.index');
	}





	/************************************************************************
    * get student search
    /************************************************************************/
	public function search(){
		$data['title'] 			= trans('common.student_title_search');

		return view('backend.students.infomation.search', $data);
	}

	/************************************************************************
    * get student detail
    /************************************************************************/
	public function detail($id){
		$data['title'] 			= '登録済み個人情報の参照';

		return view('backend.students.infomation.detail', $data);
	}

	/************************************************************************
    * get student update
    /************************************************************************/
	public function getEdit($id){
		$data['title'] 			= trans('common.student_title_edit');

		return view('backend.students.infomation.update', $data);
	}

	/************************************************************************
    * get student delete confirm
    /************************************************************************/
	public function deleteCnf(){
		$data['title'] 			= '登録済み個人情報の削除';

		return view('backend.students.infomation.delete_cnf', $data);
	}

	/************************************************************************
    * get student delete
    /************************************************************************/
	public function delete(){
		
	}

	/************************************************************************
    * get student delete
    /************************************************************************/
	public function import(){
		$data['title'] 			= '個人情報の一括取り込み';

		return view('backend.students.infomation.import', $data);
	}

	/************************************************************************
    * get student delete
    /************************************************************************/
	public function import_result(){
		$data['title'] 			= '個人情報の新規登録';

		return view('backend.students.infomation.import_result', $data);
	}
}