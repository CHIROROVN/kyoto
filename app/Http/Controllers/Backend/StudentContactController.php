<?php namespace App\Http\Controllers\Backend;
use App\Http\Models\ContactModel;
use App\Http\Models\UserModel;
use App\Http\Controllers\BackendController;
use App\Http\Models\StudentModel;
use App\Http\Models\PersonalModel;
use Input;
use Session;
use Validator;
use Auth;
use URL;

class StudentContactController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index($stu_id=null){
		$data['title'] 			= trans('common.stu_contact_title_index');
		$data['stu_id'] 			= $stu_id;
		$contactModel = new ContactModel();
		$userModel = new UserModel();
		$data['contacts'] = $contactModel->get_all($stu_id);
		$data['users'] = $userModel->get_list();
		$persModel = new PersonalModel();
		$data['student']	= $persModel->get_by_id($stu_id);
		return view('backend.students.contact.index', $data);
	}

	public function detail($stu_id=null, $contact_id=null){
		$data['title'] 			= trans('common.stu_contact_title_detail');
		$data['stu_id'] 		= $stu_id;
		$data['contact_id'] 	= $contact_id;
		$contactModel = new ContactModel();
		$userModel = new UserModel();
		$data['contact'] = $contactModel->get_contact_by_id($stu_id, $contact_id);
		$data['users'] = $userModel->get_list();
		return view('backend.students.contact.detail', $data);
	}

	public function getRegist($stu_id=null){
		$data['title'] 			= trans('common.stu_contact_title_regist');
		$data['stu_id'] 		= $stu_id;
		return view('backend.students.contact.regist', $data);
	}

	public function postRegist($stu_id=null){
		$contactModel = new ContactModel();
		$data['stu_id']						= $stu_id;
		$dataInsert = array(
				'stu_id'					=> $stu_id,
				'contact_title'				=> Input::get('contact_title'),
				'contact_main'				=> Input::get('contact_main'),
				'contact_date'				=> trim(Input::get('year')).'-'.trim(Input::get('month')).'-'.trim(Input::get('day')),
				'contact_fst_user'			=> Input::get('contact_fst_user'),
				'last_kind'					=> INSERT,
	        	'last_date'         		=> date('Y-m-d H:i:s'),
	        	'last_ipadrs'       		=> CLIENT_IP_ADRS,
	        	'last_user'					=> (Auth::check()) ? Auth::user()->u_id : '',
			);
		$validator  = Validator::make(Input::all(), $contactModel->Rules(), $contactModel->Messages());
        if ( $validator->fails() ) {
            return redirect()->route('backend.students.contact.regist', $data)->withErrors($validator)->withInput();
        }

        if ( $contactModel->insert($dataInsert) ) {
    		Session::flash('success', trans('common.message_regist_success'));
    		return redirect()->route('backend.students.contact.index', $data);
    	} else {
    		Session::flash('danger', trans('common.message_regist_danger'));
			return redirect()->route('backend.students.contact.regist', $data);
    	}
	}

	public function getEdit($stu_id=null, $contact_id=null){
		$contactModel = new ContactModel();
		$data['contact'] = $contactModel->get_contact_by_id($stu_id, $contact_id);
		$data['title'] 				= trans('common.stu_contact_title_del_cnf');
		$data['stu_id']				= $stu_id;
		$data['contact_id']			= $contact_id;
		$userModel = new UserModel();
		$data['users'] = $userModel->get_list();
		return view('backend.students.contact.edit', $data);
	}

	public function postEdit($stu_id=null, $contact_id=null){
		$data['stu_id']				= $stu_id;
		$data['contact_id']			= $contact_id;



	}

	public function deleteCnf($stu_id=null, $contact_id=null){

		$data['title'] 			= trans('common.stu_contact_title_del_cnf');
		$data['stu_id']			= $stu_id;
		$data['contact_id']			= $contact_id;
		$contactModel = new ContactModel();
		$data['contact'] = $contactModel->get_contact_by_id($stu_id, $contact_id);
		$userModel = new UserModel();
		$data['users'] = $userModel->get_list();
		return view('backend.students.contact.delete_cnf', $data);
	}

	public function delete($stu_id=null, $contact_id=null){
		$contactModel = new ContactModel();
		$data['stu_id']			= $stu_id;
		$data['contact_id']		= $contact_id;
		$dataDelete = array(
			'last_kind'			=> DELETE,
			'last_date'			=> date('Y-m-d H:i:s'),
			'last_ipadrs'       => CLIENT_IP_ADRS,
			'last_user'			=> (Auth::check()) ? Auth::user()->u_id : '',
			);
		if($contactModel->update($contact_id, $dataDelete)){
    		Session::flash('success', trans('common.message_delete_success'));
    		return redirect()->route('backend.students.contact.index', ['stu_id'=>$stu_id]);
    	}else{
    		Session::flash('danger', trans('common.message_delete_danger'));
			return redirect()->route('backend.students.contact.delete_cnf', ['stu_id'=>$stu_id, 'contact_id'=>$contact_id]);
    	}
	}

}