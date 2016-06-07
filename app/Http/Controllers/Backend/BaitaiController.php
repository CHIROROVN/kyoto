<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\BaitaiModel;
use Input;
use Session;
use Validator;
use Auth;

class BaitaiController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index() {
		// search
		$data['baitai_code'] 		= Input::get('baitai_code');
		$data['baitai_name'] 		= Input::get('baitai_name');
		$data['baitai_kind_old'] 	= Input::get('baitai_kind_old', null);
		$data['baitai_kind_new'] 	= Input::get('baitai_kind_new', null);
		$data['baitai_year_begin'] 	= Input::get('baitai_year_begin');
		$data['baitai_year_end'] 	= Input::get('baitai_year_end');
		
		$clsBaitai 			= new BaitaiModel();
		$data['baitais'] 	= $clsBaitai->get_all(Input::all());
		$data['title'] 		= '媒体情報の検索結果一覧';

		return view('backend.baitais.index', $data);
	}


	public function getRegist() {
		$data['title'] 		= '媒体情報の新規登録';
		return view('backend.baitais.regist', $data);
	}


	public function postRegist() {
		$clsBaitai             	= new BaitaiModel();
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

        $validator  = Validator::make($dataInsert, $clsBaitai->Rules(), $clsBaitai->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.baitais.regist')->withErrors($validator)->withInput();
        }

        $clsBaitai->insert($dataInsert);

        return redirect()->route('backend.baitais.index');
	}


	public function getEdit($id) {
		// search
		$data['baitai_code'] 		= Input::get('baitai_code');
		$data['baitai_name'] 		= Input::get('baitai_name');
		$data['baitai_kind_old'] 	= Input::get('baitai_kind_old', null);
		$data['baitai_kind_new'] 	= Input::get('baitai_kind_new', null);
		$data['baitai_year_begin'] 	= Input::get('baitai_year_begin');
		$data['baitai_year_end'] 	= Input::get('baitai_year_end');

		$clsBaitai 			= new BaitaiModel();
		$data['baitai'] 	= $clsBaitai->get_by_id($id);
		$data['title'] 		= '媒体情報の新規登録';

		return view('backend.baitais.edit', $data);
	}


	public function postEdit($id) {
		// search
		$data['baitai_code'] 		= Input::get('baitai_code');
		$data['baitai_name'] 		= Input::get('baitai_name');
		$data['baitai_kind_old'] 	= Input::get('baitai_kind_old', null);
		$data['baitai_kind_new'] 	= Input::get('baitai_kind_new', null);
		$data['baitai_year_begin'] 	= Input::get('baitai_year_begin');
		$data['baitai_year_end'] 	= Input::get('baitai_year_end');

		$clsBaitai             	= new BaitaiModel();
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

        $validator  = Validator::make($dataInsert, $clsBaitai->Rules(), $clsBaitai->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.baitais.edit', array($id, 
            		'baitai_code' 		=> Input::get('baitai_code'),
			        'baitai_name' 		=> Input::get('baitai_name'),
			        'baitai_kind_old' 	=> Input::get('baitai_kind_old', null),
			        'baitai_kind_new' 	=> Input::get('baitai_kind_new', null),
			        'baitai_year_begin' => Input::get('baitai_year_begin'),
			        'baitai_year_end' 	=> Input::get('baitai_year_end')
            	))->withErrors($validator)->withInput();
        }

        $clsBaitai->update($id, $dataInsert);

        return redirect()->route('backend.baitais.index', array(
        		'baitai_code' 		=> Input::get('baitai_code'),
		        'baitai_name' 		=> Input::get('baitai_name'),
		        'baitai_kind_old' 	=> Input::get('baitai_kind_old', null),
		        'baitai_kind_new' 	=> Input::get('baitai_kind_new', null),
		        'baitai_year_begin' => Input::get('baitai_year_begin'),
		        'baitai_year_end' 	=> Input::get('baitai_year_end')
        	));
	}


	public function delete($id) {
		// search
		$data['baitai_code'] 		= Input::get('baitai_code');
		$data['baitai_name'] 		= Input::get('baitai_name');
		$data['baitai_kind_old'] 	= Input::get('baitai_kind_old', null);
		$data['baitai_kind_new'] 	= Input::get('baitai_kind_new', null);
		$data['baitai_year_begin'] 	= Input::get('baitai_year_begin');
		$data['baitai_year_end'] 	= Input::get('baitai_year_end');

		$clsBaitai             	= new BaitaiModel();
		$dataUpdate 			= array(
			'last_date'         => date('Y-m-d H:i:s'),
			'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
		);
		$clsBaitai->update($id, $dataUpdate);

        return redirect()->route('backend.baitais.index', array(
        		'baitai_code' 		=> Input::get('baitai_code'),
		        'baitai_name' 		=> Input::get('baitai_name'),
		        'baitai_kind_old' 	=> Input::get('baitai_kind_old', null),
		        'baitai_kind_new' 	=> Input::get('baitai_kind_new', null),
		        'baitai_year_begin' => Input::get('baitai_year_begin'),
		        'baitai_year_end' 	=> Input::get('baitai_year_end')
        	));
	}


	public function search()
	{
		// search
		$data['baitai_code'] 		= Input::get('baitai_code');
		$data['baitai_name'] 		= Input::get('baitai_name');
		$data['baitai_kind_old'] 	= Input::get('baitai_kind_old');
		$data['baitai_kind_new'] 	= Input::get('baitai_kind_new');
		$data['baitai_year_begin'] 	= Input::get('baitai_year_begin');
		$data['baitai_year_end'] 	= Input::get('baitai_year_end');

		// reset where
		if (Input::get('where') == 'null') {
			// search
			$data['baitai_code'] 		= null;
			$data['baitai_name'] 		= null;
			$data['baitai_kind_old'] 	= null;
			$data['baitai_kind_new'] 	= null;
			$data['baitai_year_begin'] 	= null;
			$data['baitai_year_end'] 	= null;

			return redirect()->route('backend.baitais.search');
		}

		$data['title'] 		= '媒体の検索';
		return view('backend.baitais.search', $data);
	}
}