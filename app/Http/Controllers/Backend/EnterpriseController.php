<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\EnterpriseModel;
use App\Http\Models\CustomerModel;
use Auth;
use Validator;
use Input;
use Redirect;
use Hash;
use Session;
use Response;
use Html;
use DB;
use URL;

class EnterpriseController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index() {
		$clsEnterprise 			= new EnterpriseModel();
		$data['enterprises'] 	= $clsEnterprise->get_all();
		$data['title'] 			= '法人情報の検索結果一覧';

		return view('backend.enterprises.index', $data);
	}


	public function getRegist() {
		$data['title']         = '媒体情報の新規登録';
		$data['cus_name']      = '';
		return view('backend.enterprises.regist', $data);
	}

	function getCusNameAjax(){
		$cmModel = new CustomerModel();
		$cnk = Input::get('cnk');
		$cn_kana = $cmModel->get_cus_by_kana($cnk);
        return Response::json(array('cnk' => $cn_kana));
	}

	public function postRegist() {
		$cn = Input::get('cnk');
		var_dump($cn);
		echo "<pre>";
		print_r(Input::all());exit;
		$clsEnterprise          = new EnterpriseModel();
        $dataInsert             = array(
            'baitai_code'      	=> Input::get('baitai_code'),
            'baitai_name'      	=> Input::get('baitai_name'),
            'baitai_kind'      	=> Input::get('baitai_kind'),
            'baitai_year'      	=> Input::get('baitai_year'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => INSERT,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $validator  = Validator::make($dataInsert, $clsEnterprise->Rules(), $clsEnterprise->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.enterprises.regist')->withErrors($validator)->withInput();
        }

        $clsEnterprise->insert($dataInsert);

        return redirect()->route('backend.enterprises.index');
	}


	public function getEdit($id) {
		$clsEnterprise 			= new EnterpriseModel();
		$data['baitai'] 		= $clsEnterprise->get_by_id($id);
		$data['title'] 			= '媒体情報の新規登録';

		return view('backend.enterprises.edit', $data);
	}


	public function postEdit($id) {
		$clsEnterprise          = new EnterpriseModel();
        $dataInsert             = array(
            'baitai_code'      	=> Input::get('baitai_code'),
            'baitai_name'      	=> Input::get('baitai_name'),
            'baitai_kind'      	=> Input::get('baitai_kind'),
            'baitai_year'      	=> Input::get('baitai_year'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => UPDATE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $validator  = Validator::make($dataInsert, $clsEnterprise->Rules(), $clsEnterprise->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.enterprises.edit', $id)->withErrors($validator)->withInput();
        }

        $clsEnterprise->update($id, $dataInsert);

        return redirect()->route('backend.enterprises.index');
	}

	public function delete($id) {
		$clsEnterprise          = new EnterpriseModel();
		$dataUpdate 			= array(
			'last_date'         => date('Y-m-d H:i:s'),
			'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
		);
		$clsEnterprise->update($id, $dataUpdate);

        return redirect()->route('backend.enterprises.index');
	}

	public function search()
	{
		$data['title'] 		= '媒体の検索';
		return view('backend.enterprises.search', $data);
	}
}