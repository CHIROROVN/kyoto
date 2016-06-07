<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\CampaignModel;
use App\Http\Models\PresentModel;
use App\Http\Models\BaitaiModel;
use Input;
use Session;
use Validator;
use Auth;

class CampaignController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index() {
		$clsCampaign 		= new CampaignModel();
		$data['campaigns'] 	= $clsCampaign->get_all_join();
		$data['title']  	= 'キャンペーン情報の検索結果一覧';

		return view('backend.campaigns.index', $data);
	}


	public function getRegist() {
		$clsBaitai 			= new BaitaiModel();
		$clsPresent 		= new PresentModel();
		$data['baitais'] 	= $clsBaitai->get_all();
		$data['presents'] 	= $clsPresent->get_all();
		$data['title']  	= 'キャンペーンの新規登録';

		return view('backend.campaigns.regist', $data);
	}


	public function postRegist() {
		$clsCampaign            = new CampaignModel();
        $dataInsert             = array(
            'campaign_name'     => Input::get('campaign_name'),
            'baitai_id'      	=> Input::get('baitai_id'),
            'presentlist_id'    => Input::get('presentlist_id'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => INSERT,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $validator  = Validator::make($dataInsert, $clsCampaign->Rules(), $clsCampaign->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.campaigns.regist')->withErrors($validator)->withInput();
        }

        $clsCampaign->insert($dataInsert);

        return redirect()->route('backend.campaigns.index');
	}


	public function getEdit($id) {
		$clsCampaign 		= new CampaignModel();
		$clsBaitai 			= new BaitaiModel();
		$clsPresent 		= new PresentModel();
		$data['baitais'] 	= $clsBaitai->get_all();
		$data['presents'] 	= $clsPresent->get_all();
		$data['campaign'] 	= $clsCampaign->get_by_id($id);
		$data['title']  	= 'キャンペーンの新規登録';

		return view('backend.campaigns.edit', $data);
	}


	public function postEdit($id) {
		$clsCampaign            = new CampaignModel();
        $dataInsert             = array(
            'campaign_name'     => Input::get('campaign_name'),
            'baitai_id'      	=> Input::get('baitai_id'),
            'presentlist_id'    => Input::get('presentlist_id'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => INSERT,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $validator  = Validator::make($dataInsert, $clsCampaign->Rules(), $clsCampaign->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.campaigns.edit', $id)->withErrors($validator)->withInput();
        }

        $clsCampaign->update($id, $dataInsert);

        return redirect()->route('backend.campaigns.index');
	}


	public function delete($id) {
		$clsCampaign            = new CampaignModel();
		$dataUpdate 			= array(
			'last_date'         => date('Y-m-d H:i:s'),
			'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
		);
		$clsCampaign->update($id, $dataUpdate);

        return redirect()->route('backend.campaigns.index');
	}
}