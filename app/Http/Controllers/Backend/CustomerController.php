<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\CustomerModel;
use Input;
use Session;
use Validator;
use Auth;

class CustomerController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index() {
		$clsCustomer 			= new CustomerModel();
		$data['customers'] 		= $clsCustomer->get_all();
		$data['title'] 			= '顧客情報の検索結果一覧';

		return view('backend.customers.index', $data);
	}


	public function getRegist() {
		$data['title'] 			= '顧客情報の新規登録';
		return view('backend.customers.regist', $data);
	}


	public function postRegist() {
		$clsCustomer            		= new CustomerModel();
        $dataInsert             		= array(
            'cus_code'    	            => Input::get('cus_code'),
            'cus_name'                  => Input::get('cus_name'),
            'cus_title'                 => Input::get('cus_title'),
            'cus_old_name'              => Input::get('cus_old_name'),
            'cus_notice'                => Input::get('cus_notice'),
            'cus_pay'                   => Input::get('cus_pay'),
            'cus_kind'                  => Input::get('cus_kind'),
            'cus_owner'                 => Input::get('cus_owner'),
            'cus_sex'                   => Input::get('cus_sex'),
            'cus_login'                 => Input::get('cus_login'),
            'cus_passwd'                => Input::get('cus_passwd'),

            'cus_staff1_belong'         => Input::get('cus_staff1_belong'),
            'cus_staff1_name'           => Input::get('cus_staff1_name'),
            'cus_staff1_name_kana'      => Input::get('cus_staff1_name_kana'),
            'cus_staff1_tel'            => Input::get('cus_staff1_tel'),
            'cus_staff1_fax'            => Input::get('cus_staff1_fax'),
            'cus_staff1_email'          => Input::get('cus_staff1_email'),

            'cus_staff2_belong'         => Input::get('cus_staff2_belong'),
            'cus_staff2_name'           => Input::get('cus_staff2_name'),
            'cus_staff2_name_kana'      => Input::get('cus_staff2_name_kana'),
            'cus_staff2_tel'            => Input::get('cus_staff2_tel'),
            'cus_staff2_fax'            => Input::get('cus_staff2_fax'),
            'cus_staff2_email'          => Input::get('cus_staff2_email'),

            'cus_staff3_belong'         => Input::get('cus_staff3_belong'),
            'cus_staff3_name'           => Input::get('cus_staff3_name'),
            'cus_staff3_name_kana'      => Input::get('cus_staff3_name_kana'),
            'cus_staff3_tel'            => Input::get('cus_staff3_tel'),
            'cus_staff3_fax'            => Input::get('cus_staff3_fax'),
            'cus_staff3_email'          => Input::get('cus_staff3_email'),

            'cus_mail_send'             => Input::get('cus_mail_send'),
            'cus_zip_pwd'               => Input::get('cus_zip_pwd'),
            'cus_mail_span'             => Input::get('cus_mail_span'),
            'cus_mail_youbi'            => Input::get('cus_mail_youbi'),
            'cus_mail_hi'               => Input::get('cus_mail_hi'),
            'cus_mail_attach'           => Input::get('cus_mail_attach'),

            'last_date'         		=> date('Y-m-d H:i:s'),
            'last_kind'         		=> INSERT,
            'last_ipadrs'       		=> $_SERVER['REMOTE_ADDR'],
            'last_user'         		=> (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $validator  = Validator::make($dataInsert, $clsCustomer->Rules(), $clsCustomer->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.customers.regist')->withErrors($validator)->withInput();
        }

        $clsCustomer->insert($dataInsert);

        return redirect()->route('backend.customers.index');
	}


	public function getEdit($id) {
		$clsCustomer 		= new CustomerModel();
		$data['customer'] 	= $clsCustomer->get_by_id($id);
		$data['title'] 		= '顧客情報の新規登録';

		return view('backend.customers.edit', $data);
	}


	public function postEdit($id) {
		$clsCustomer             	= new CustomerModel();
        $dataInsert             = array(
            'cus_code'    	            => Input::get('cus_code'),
            'cus_name'                  => Input::get('cus_name'),
            'cus_title'                 => Input::get('cus_title'),
            'cus_old_name'              => Input::get('cus_old_name'),
            'cus_notice'                => Input::get('cus_notice'),
            'cus_pay'                   => Input::get('cus_pay'),
            'cus_kind'                  => Input::get('cus_kind'),
            'cus_owner'                 => Input::get('cus_owner'),
            'cus_sex'                   => Input::get('cus_sex'),
            'cus_login'                 => Input::get('cus_login'),
            'cus_passwd'                => Input::get('cus_passwd'),

            'cus_staff1_belong'         => Input::get('cus_staff1_belong'),
            'cus_staff1_name'           => Input::get('cus_staff1_name'),
            'cus_staff1_name_kana'      => Input::get('cus_staff1_name_kana'),
            'cus_staff1_tel'            => Input::get('cus_staff1_tel'),
            'cus_staff1_fax'            => Input::get('cus_staff1_fax'),
            'cus_staff1_email'          => Input::get('cus_staff1_email'),

            'cus_staff2_belong'         => Input::get('cus_staff2_belong'),
            'cus_staff2_name'           => Input::get('cus_staff2_name'),
            'cus_staff2_name_kana'      => Input::get('cus_staff2_name_kana'),
            'cus_staff2_tel'            => Input::get('cus_staff2_tel'),
            'cus_staff2_fax'            => Input::get('cus_staff2_fax'),
            'cus_staff2_email'          => Input::get('cus_staff2_email'),

            'cus_staff3_belong'         => Input::get('cus_staff3_belong'),
            'cus_staff3_name'           => Input::get('cus_staff3_name'),
            'cus_staff3_name_kana'      => Input::get('cus_staff3_name_kana'),
            'cus_staff3_tel'            => Input::get('cus_staff3_tel'),
            'cus_staff3_fax'            => Input::get('cus_staff3_fax'),
            'cus_staff3_email'          => Input::get('cus_staff3_email'),

            'cus_mail_send'             => Input::get('cus_mail_send'),
            'cus_zip_pwd'               => Input::get('cus_zip_pwd'),
            'cus_mail_span'             => Input::get('cus_mail_span'),
            'cus_mail_youbi'            => Input::get('cus_mail_youbi'),
            'cus_mail_hi'               => Input::get('cus_mail_hi'),
            'cus_mail_attach'           => Input::get('cus_mail_attach'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => UPDATE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $validator  = Validator::make($dataInsert, $clsCustomer->Rules(), $clsCustomer->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.customers.edit', $id)->withErrors($validator)->withInput();
        }

        $clsCustomer->update($id, $dataInsert);

        return redirect()->route('backend.customers.index');
	}


	public function delete($id) {
		$clsCustomer            = new CustomerModel();
		$dataUpdate 			= array(
			'last_date'         => date('Y-m-d H:i:s'),
			'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
		);
		$clsCustomer->update($id, $dataUpdate);

        // set page current
        $page = $this->set_page($clsBaitai, Input::get('page'));

        return redirect()->route('backend.customers.index', ['page' => $page]);
	}


	public function search()
	{
		$data['title'] 		= '顧客の検索';
		return view('backend.customers.search', $data);
	}
}