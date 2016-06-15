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

	public static function getCusName($ent_id=null){
		$cmModel = new CustomerModel();
		return $cmModel->get_cus_by_ent_id($ent_id);
	}

	public function detail($id) {
		$clsEnterprise 			= new EnterpriseModel();
		$data['enterprise'] 	= $clsEnterprise->get_by_id($id);
		$data['title'] 			= '登録済み法人情報の詳細';

		return view('backend.enterprises.detail', $data);
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
		$cns = Input::get('cus_name_lb2');
        $dataInsert             = array(
            // 'ent_id'      		=> Input::get('ent_id'),
            'ent_name'      	=> Input::get('ent_name'),
            'ent_login'      	=> Input::get('ent_login'),
            'ent_passwd'        => Input::get('ent_passwd'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => INSERT,
            'last_ipadrs'       => CLIENT_IP_ADRS,
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : '',
        );
        $clsEnterprise          = new EnterpriseModel();
        $max_ent_id = $clsEnterprise->find_max_id() + 1;
        $validator  = Validator::make(Input::all(), $clsEnterprise->Rules(), $clsEnterprise->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.enterprises.regist')->withErrors($validator)->withInput();
        }else{
        	$cmModel = new CustomerModel();
        	$customers = $cmModel->get_cus_by_cid($cns);
        	if(!empty($customers)){
        		foreach($customers as $cus){
        			foreach ($cns as $key=>$cn) {
        				if($cus->cus_id == $cn){
        					$cmModel->update($cn, ['ent_id' => $max_ent_id]);
        				}
        			}
        			
        		}
        	}

        	if ( $clsEnterprise->insert($dataInsert) ){
	    		Session::flash('success', 'The Enterprise registed successfully.');
	    		return redirect()->route('backend.enterprises.index');
	    	} else {
	    		Session::flash('danger', 'The Enterprise regist faild, try again!');
				return redirect()->route('backend.enterprises.regist')->with('title', $title);
	    	}
        }
	}


	public function getEdit($id) {
		$clsEnterprise 			= new EnterpriseModel();
		$data['enterprise'] 		= $clsEnterprise->get_by_id($id);
		$data['title'] 			= 'メディア情報のエディション';

		return view('backend.enterprises.edit', $data);
	}

	public function postEdit($id) {
		$cns = Input::get('cus_name_lb2');
		$clsEnterprise          = new EnterpriseModel();
		$rules = $clsEnterprise->Rules();
		$data 		= $clsEnterprise->get_by_id($id);
		$ent_login = $data->ent_login;
		if(Input::get('ent_login') == $ent_login)
			unset($rules['ent_login']);
		
        $dataUpdate             = array(
           // 'ent_id'      		=> Input::get('ent_id'),
            'ent_name'      	=> Input::get('ent_name'),
            'ent_login'      	=> Input::get('ent_login'),
            'ent_passwd'      	=> Input::get('ent_passwd'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => UPDATE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : '',
        );

        $validator  = Validator::make(Input::all(), $rules, $clsEnterprise->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.enterprises.regist')->withErrors($validator)->withInput();
        }else{
        	$cmModel = new CustomerModel();
        	$customers = $cmModel->get_cus_by_cid($cns);
        	$cusByEntID = $cmModel->get_by_ent_id($id);
        	echo "<pre>"; print_r($cusByEntID);die;
        	if(!empty($customers)){
        		foreach($customers as $cus){
        			
        			if(!empty($cns)){
	        			foreach ($cns as $cn) {
	        				if($cus->cus_id == $cn){
	        					$cmModel->update($cn, ['ent_id' => $id]);
	        				}else{
	        					$cmModel->update($cn, ['ent_id' => null]);
	        				}
	        			}
	        		}
        		}
        	}else{
        		if(!empty($customers)){

        		}
	        		//$cmModel->update($cus->cus_id, ['ent_id' => null]);
	        }

        	if ( $clsEnterprise->update($id, $dataUpdate) ){
	    		Session::flash('success', 'The Enterprise updated successfully.');
	    		return redirect()->route('backend.enterprises.index');
	    	} else {
	    		Session::flash('danger', 'The Enterprise updated faild, try again!');
				return redirect()->route('backend.enterprises.edit')->with('title', $title);
	    	}
        }
	}

	public function delete($id) {
		$clsEnterprise          = new EnterpriseModel();
		$dataDelete 			= array(
			'last_date'         => date('Y-m-d H:i:s'),
			'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : '',
		);

		if ( $clsEnterprise->update($id, $dataDelete) ){
    		Session::flash('success', 'The Enterprise deleted successfully.');
    		return redirect()->route('backend.enterprises.index');
    	} else {
    		Session::flash('danger', 'The Enterprise deleted faild, try again!');
			return redirect()->route('backend.enterprises.index')->with('title', $title);
    	}
	}

	public function search()
	{
		$data['title'] 		= '媒体の検索';
		return view('backend.enterprises.search', $data);
	}
}