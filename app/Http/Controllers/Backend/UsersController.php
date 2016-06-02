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
		return view('backend.users.index');
	}

	public function getChangePasswd(){
		$title = "パスワードを変更する";
		return view('backend.users.change_passwd', compact('title'));
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