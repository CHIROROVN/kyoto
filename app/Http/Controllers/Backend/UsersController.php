<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\UserModel;
use Input;
use Session;
use Validator;
use Auth;
use Hash;

class UsersController extends BackendController
{
	public function __construct()
	{
		parent::__construct();		
	}

	public function index() {
		$userModel = new UserModel();
		$title = "ユーザー情報の検索結果一覧";
		$users  = $userModel->get_all();
		return view('backend.users.index', compact('users', 'title'));
	}

	public function getChangePasswd(){
		$title = "パスワードを変更する";
		return view('backend.users.change_passwd', compact('title'));
	}

	public function getRegist(){
		$title = "ユーザーの新規登録";
		return view('backend.users.regist', compact('title'));
	}

	public function postRegist(){
		$title = "ユーザーの新規登録";
		$id = Auth::user()->u_id;
		$userModel 	= new UserModel();
		$dataInsert = array(
			'remember_token'		=> Input::get('_token'),
			'u_name'				=> Input::get('u_name'),
			'u_login'				=> Input::get('u_login'),
			'u_passwd'				=> Hash::make(Input::get('u_passwd')),
			'u_belong'				=> Input::get('u_belong'),
			'u_power'				=> json_encode(Input::get('u_power')),
        	'last_kind'				=> INSERT,
        	'last_date'         	=> date('Y-m-d H:i:s'),
        	'last_ipadrs'       	=> CLIENT_IP_ADRS,
        	'last_user'				=> $id,
			);
		$validator  = Validator::make(Input::all(), $userModel->addRules(), $userModel->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.users.regist')->withErrors($validator)->withInput();
        }

        if($userModel->insert($dataInsert)){
    		Session::flash('success', 'The user registed successfully.');
    		return redirect()->route('backend.users.index');
    	}else{
    		Session::flash('danger', 'The user regist faild, try again!');
			return redirect()->route('backend.users.regist')->with('title', $title);
    	}

	}

	public function getUpdate($id){
		$title = "パスワードを変更する";
		$userModel = new UserModel();
		$user = $userModel->get_by_id($id);
		return view('backend.users.update', compact('user','title'));
	}

	public function postUpdate($id){
		$title = "ユーザーの新規登録";
		$id = Auth::user()->u_id;
		$userModel 	= new UserModel();
		$rules = $userModel->addRules();
		$passwd = Input::get('u_passwd');
		$dataUpdate = array();
		if(empty($passwd))
			unset($rules['u_passwd']);

		$dataUpdate['remember_token']		= Input::get('_token');
		$dataUpdate['u_name']				= Input::get('u_name');
		$dataUpdate['u_login']				= Input::get('u_login');
		$dataUpdate['u_passwd']				=                                                                  
		$dataUpdate['u_belong']				=
		$dataUpdate['u_power']				=
		$dataUpdate['last_kind']			=
		$dataUpdate['last_date']			= date('Y-m-d H:i:s');
		$dataUpdate['last_ipadrs']			= CLIENT_IP_ADRS;
		$dataUpdate['last_user']			= $id;

		$dataUpdate = array(
			'remember_token'		=> Input::get('_token'),
			'u_name'				=> Input::get('u_name'),
			'u_login'				=> Input::get('u_login'),
			'u_passwd'				=> Hash::make(Input::get('u_passwd')),
			'u_belong'				=> Input::get('u_belong'),
			'u_power'				=> json_encode(Input::get('u_power')),
        	'last_kind'				=> INSERT,
        	'last_date'         	=> date('Y-m-d H:i:s'),
        	'last_ipadrs'       	=> CLIENT_IP_ADRS,
        	'last_user'				=> $id,
			);
		$validator  = Validator::make(Input::all(), $userModel->addRules(), $userModel->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.users.regist')->withErrors($validator)->withInput();
        }

        if($userModel->insert($dataInsert)){
    		Session::flash('success', 'The user registed successfully.');
    		return redirect()->route('backend.users.index');
    	}else{
    		Session::flash('danger', 'The user regist faild, try again!');
			return redirect()->route('backend.users.regist')->with('title', $title);
    	}


	}

	public function delete($id){
		$title = "パスワードを変更する";
	}

	public function ChangePasswd(){
		$title = "パスワードを変更する";
		$userModel = new UserModel();
		$id = Auth::user()->u_id;
		$oldPasswd = Auth::user()->password;
		$currPasswd = Input::get('currpasswd');		

        if(Hash::check($currPasswd, $oldPasswd)){
        	$validator  = Validator::make(Input::all(), $userModel->Rules(), $userModel->Messages());
	        if ($validator->fails()) {
	            return redirect()->route('backend.users.change_passwd')->withErrors($validator)->withInput();
	        }
	        $dataUpdate = array(
	        	'u_passwd'				=> Hash::make(Input::get('newpasswd')),
	        	'last_kind'				=> UPDATE,
	        	'last_date'         	=> date('Y-m-d H:i:s'),
	        	'last_ipadrs'       	=> CLIENT_IP_ADRS,
	        	'last_user'				=> $id,
	        	);

        	if($userModel->update($id, $dataUpdate)){
        		Session::flash('success', 'The password changed successfully.');
        		return redirect()->route('backend.users.change_passwd')->with('title', $title);
        	}else{
        		Session::flash('danger', 'The password changed faild, try again!');
				return redirect()->route('backend.users.change_passwd')->with('title', $title);
        	}
		}else{
			Session::flash('danger', 'Current password incorrect, try again!');
			return redirect()->route('backend.users.change_passwd')->with('title', $title);
		}

	}
}