<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\PresentModel;
use Input;
use Session;
use Validator;
use Auth;

class PresentController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index() {
		$clsPresent = new PresentModel();
		$data['presents'] = $clsPresent->get_all();

		return view('backend.presents.index', $data);
	}


	public function getRegist() {
		return view('backend.presents.regist');
	}


	public function postRegist() {
		$clsPresent             = new PresentModel();
        $dataInsert             = array(
            'present_code'      => Input::get('present_code'),
            'present_name'      => Input::get('present_name'),

            'last_kind'         => INSERT,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $validator  = Validator::make($dataInsert, $clsPresent->Rules(), $clsPresent->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.presents.regist')->withErrors($validator)->withInput();
        }

        $clsPresent->insert($dataInsert);

        return redirect()->route('backend.presents.index');
	}


	public function getEdit($id) {
		$clsPresent 		= new PresentModel();
		$data['present'] 	= $clsPresent->get_by_id($id);

		return view('backend.presents.edit', $data);
	}


	public function postEdit($id) {
		$clsPresent             = new PresentModel();
        $dataInsert             = array(
            'present_code'      => Input::get('present_code'),
            'present_name'      => Input::get('present_name'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => UPDATE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $validator  = Validator::make($dataInsert, $clsPresent->Rules(), $clsPresent->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.presents.edit', $id)->withErrors($validator)->withInput();
        }

        $clsPresent->update($id, $dataInsert);

        return redirect()->route('backend.presents.index');
	}


	public function delete($id) {
		$clsPresent             = new PresentModel();
		$dataUpdate = array(
			'last_date'         => date('Y-m-d H:i:s'),
			'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
		);
		$clsPresent->update($id, $dataUpdate);

        return redirect()->route('backend.presents.index');
	}
}