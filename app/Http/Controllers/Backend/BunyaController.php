<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\BunyaModel;
use Input;
use Session;
use Validator;
use Auth;

class BunyaController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index() {
		$clsBunya 		= new BunyaModel();
		$data['bunyas'] = $clsBunya->get_all();

		return view('backend.bunyas.index', $data);
	}


	public function getRegist() {
		return view('backend.bunyas.regist');
	}


	public function postRegist() {
		$clsBunya             	= new BunyaModel();
        $dataInsert             = array(
            'bunya_code'      	=> Input::get('bunya_code'),
            'bunya_name'      	=> Input::get('bunya_name'),
            'bunya_kind'      	=> Input::get('bunya_kind'),
            'bunya_class'      	=> Input::get('bunya_class'),

            'last_kind'         => INSERT,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $validator  = Validator::make($dataInsert, $clsBunya->Rules(), $clsBunya->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.bunyas.regist')->withErrors($validator)->withInput();
        }

        $clsBunya->insert($dataInsert);

        return redirect()->route('backend.bunyas.index');
	}


	public function getEdit($id) {
		$clsBunya 		= new BunyaModel();
		$data['bunya'] 	= $clsBunya->get_by_id($id);

		return view('backend.bunyas.edit', $data);
	}


	public function postEdit($id) {
		$clsBunya             	= new BunyaModel();
        $dataInsert             = array(
            'bunya_code'      	=> Input::get('bunya_code'),
            'bunya_name'      	=> Input::get('bunya_name'),
            'bunya_kind'      	=> Input::get('bunya_kind'),
            'bunya_class'      	=> Input::get('bunya_class'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => UPDATE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $validator  = Validator::make($dataInsert, $clsBunya->Rules(), $clsBunya->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.bunyas.edit', $id)->withErrors($validator)->withInput();
        }

        $clsBunya->update($id, $dataInsert);

        return redirect()->route('backend.bunyas.index');
	}


	public function delete($id) {
		$clsBunya             	= new BunyaModel();
		$dataUpdate 			= array(
			'last_date'         => date('Y-m-d H:i:s'),
			'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
		);
		$clsBunya->update($id, $dataUpdate);

        return redirect()->route('backend.bunyas.index');
	}


	public function search()
	{
		return view('backend.bunyas.search');
	}
}