<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\PersonalModel;
use App\Http\Models\PrefModel;
use App\Http\Models\HighschoolModel;
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
		$clsPersonal            = new PersonalModel();
		$data['students']		= $clsPersonal->get_all()['db'];
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';die;
		$data['title'] 			= trans('common.student_title_index');

		$data['count_all']		= $clsPersonal->count();
		$data['total_count'] 	= $clsPersonal->get_all(true, Input::all())['total_count'];
		$page_current 			= Input::get('page', 1);
		$data['record_from'] 	= (($page_current - 1) * PAGINATION) + 1;
		$data['record_to'] 		= $data['record_from'] - 1;
		if ( $data['count_all'] == 0 ) {
			$data['record_from'] = 0;
		}
		if ( $data['total_count'] == 0 ) {
			$data['record_to'] = 0;
			$data['record_from'] = 0;
		}

		return view('backend.students.infomation.index', $data);
	}


	/**
	 * get view regist
	 */
	public function getRegist(){
		$clsPersonal            = new PersonalModel();
		$clsPref				= new PrefModel();
		$data['per_id']			= $clsPersonal->get_max() + 1;
		$data['prefs']			= $clsPref->get_for_select();
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
			'per_pref_code'      	=> Input::get('per_pref_code'),
			'per_address1'      	=> Input::get('per_address1'),
			'per_address2'      	=> Input::get('per_address2'),
			'per_address3'      	=> Input::get('per_address3'),
			'fst_date'				=> date('Y-m-d'),
			'per_status'			=> (Input::get('regist')) ? 1 : 0,

			'per_birthday'      	=> '',
			'per_grade'				=> '',
			'per_hs_id'				=> '',
			'per_univ_id'			=> '',

			'last_date'         	=> date('Y-m-d'),
			'last_kind'         	=> INSERT,
			'last_ipadrs'       	=> CLIENT_IP_ADRS,
			'last_user'         	=> (Auth::check()) ? Auth::user()->u_id : 0,
		);

		$dataInsert['pamph_id'] = Input::get('pamph_id_1');

		$validator  = Validator::make($dataInsert, $clsPersonal->Rules(), $clsPersonal->Messages());
		if ($validator->fails()) {
			return redirect()->route('backend.students.regist')->withErrors($validator)->withInput();
		}

		unset($dataInsert['baitai_id']);
		unset($dataInsert['pamph_id']);
		if ( Input::get('per_birthday_year') && Input::get('per_birthday_month') && Input::get('per_birthday_day') ) {
			$dataInsert['per_birthday'] = Input::get('per_birthday_year') . '-' . Input::get('per_birthday_month') . '-' . Input::get('per_birthday_day');
		}

		// insert to table t_personal
		if ( $student_id = $clsPersonal->insert_get_id($dataInsert) ) {
			Session::flash('success', trans('common.message_regist_success'));
		} else {
			Session::flash('danger', trans('common.message_regist_danger'));
		}

		// insert to table t_brochure_history

		// insert to table t_orderpresent


		return redirect()->route('backend.students.index');
	}


	/**
	 * get view student detail
	 * $id: ID record
	 */
	public function detail($id){
		$clsPersonal             	= new PersonalModel();
		$data['personal']			= $clsPersonal->get_by_id($id);
		$data['title'] 				= trans('common.student_title_detail');

		return view('backend.students.infomation.detail', $data);
	}


	/**
	 * get view search
	 */
	public function search(){
		$data['title'] 			= trans('common.student_title_search');

		return view('backend.students.infomation.search', $data);
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



	public function AutoCompleteHighschool()
	{
		$key 				= Input::get('key', '');
		$clsHighschool 		= new HighschoolModel();
		$highshools 		= $clsHighschool->get_for_autocomplate($key);
		$tmp = array();
		foreach ( $highshools as $highshool ) {
			$tmp[] = (object)array(
				'value' 	=> $highshool->hs_id,
				'label' 	=> $highshool->hs_code . '_' . $highshool->hs_name,
				'desc' 		=> $highshool->hs_code . '_' . $highshool->hs_name
			);
		}
		echo json_encode($tmp);
	}
}