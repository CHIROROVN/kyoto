<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\PamphletModel;
use App\Http\Models\PrefModel;
use App\Http\Models\AreaModel;
use App\Http\Models\BunyaModel;
use App\Http\Models\CustomerModel;
use Input;
use Session;
use Validator;
use Auth;

class PamphletController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * show list pamphlets
	 */
	public function index() {
		// search
		$data['s_pamph_number'] 			= Input::get('s_pamph_number');
		$data['s_pamph_name'] 				= Input::get('s_pamph_name');
		$data['s_pamph_kind_school'] 		= Input::get('s_pamph_kind_school');
		$data['s_pamph_kind_reserve'] 		= Input::get('s_pamph_kind_reserve');
		$data['s_pamph_kind_bundle'] 		= Input::get('s_pamph_kind_bundle');
		$data['s_pamph_class_unused'] 		= Input::get('s_pamph_class_unused');
		$data['s_pamph_class_used'] 		= Input::get('s_pamph_class_used');
		$data['s_pamph_cus_id'] 			= Input::get('s_pamph_cus_id');
		$data['s_pamph_send'] 				= Input::get('s_pamph_send');
		$data['s_pamph_bunya_id'] 			= Input::get('s_pamph_bunya_id');
		$data['s_pamph_pref'] 				= Input::get('s_pamph_pref');
		$data['s_pamph_area'] 				= Input::get('s_pamph_area');
		$data['s_pamph_sex_unspecified'] 	= Input::get('s_pamph_sex_unspecified');
		$data['s_pamph_sex_men'] 			= Input::get('s_pamph_sex_men');
		$data['s_pamph_sex_women'] 			= Input::get('s_pamph_sex_women');
		
		$clsPamphlet 					= new PamphletModel();
		$clsBunya						= new BunyaModel();
		$clsCustomer 					= new CustomerModel();
		$clsArea 						= new AreaModel();
		$clsPref 						= new PrefModel();
		$data['pamphlets'] 				= $clsPamphlet->get_all(true, Input::all())['db'];
		$data['pamphlets_distinct'] 	= $clsPamphlet->get_all_distinct();
		// set bunyas
		$bunyas 				= $clsBunya->get_for_select();
		foreach ( $bunyas as $bunya ) {
			$tmp[$bunya->bunya_id] = $bunya->bunya_name;
		}
		$data['bunyas']			= $tmp;
		// set customers
		$customers 				= $clsCustomer->get_for_select();
		foreach ( $customers as $customer ) {
			$tmp[$customer->cus_id] = $customer->cus_name;
		}
		$data['customers']		= $tmp;
		// set area
		$areas 					= $clsArea->get_for_select();
		foreach ( $areas as $area ) {
			$tmp[$area->area_id] = $area->area_name;
		}
		$data['areas'] 			= $tmp;
		// set pref
		$prefs 					= $clsPref->get_for_select();
		foreach ( $prefs as $pref ) {
			$tmp[$pref->pref_id] = $pref->pref_name;
		}
		$data['prefs'] 			= $tmp;
		$data['title'] 			= '資料請求情報の検索結果一覧';

		$data['count_all']		= $clsPamphlet->count();
		$data['total_count'] 	= $clsPamphlet->get_all(true, Input::all())['total_count'];

		$page_current 			= Input::get('page', 1);
		$data['record_from'] 	= (($page_current - 1) * PAGINATION) + 1;
		$data['record_to'] 		= $data['record_from'] - 1;
		if ( $data['count_all'] == 0 ) {
			$data['record_from'] = 0;
		}
		if ( $data['total_count'] == 0 ) {
			$data['record_to'] = 0;
			$data['record_from'] = 0;
		}

		return view('backend.pamphlets.index', $data);
	}


	/**
	 * get view regist
	 */
	public function getRegist() {
		$clsPref 			= new PrefModel();
		$clsArea 			= new AreaModel();
		$clsBunya 			= new BunyaModel();
		$clsCustomer 		= new CustomerModel();
		$data['prefs'] 		= $clsPref->get_for_select();
		$data['areas']		= $clsArea->get_for_select();
		$data['title'] 		= '資料請求番号の新規登録';
		$bunyas				= $clsBunya->get_for_select();
		$customers			= $clsCustomer->get_for_select();

		// set value for complate bunyas
		foreach ( $bunyas as $bunya ) {
			$tmp[] = array(
				'value' => $bunya->bunya_code,
				'label' => $bunya->bunya_name,
				'desc' => $bunya->bunya_code . '_' . $bunya->bunya_name
			);
		}
		$data['bunyas'] = json_encode($tmp);

		// set value for complate customers
		foreach ( $customers as $customer ) {
			$tmp[] = array(
				'value' => $customer->cus_code,
				'label' => $customer->cus_name,
				'desc' => $customer->cus_code . '_' . $customer->cus_name
			);
		}
		$data['customers'] = json_encode($tmp);

		return view('backend.pamphlets.regist', $data);
	}


	/**
	 * insert database
	 */
	public function postRegist() {
		$clsPamphlet            = new PamphletModel();
		$clsBunya 				= new BunyaModel();
		$clsCustomer 			= new CustomerModel();
		$pamph_bunya_id 		= $clsBunya->get_by_code(Input::get('pamph_bunya_id'));
		if ( empty($pamph_bunya_id) ) {
			$pamph_bunya_id 		= '';
		} else {
			$pamph_bunya_id 		= $pamph_bunya_id->bunya_id;
		}

		$arr_cus_id 			= Input::get('pamph_cus_id');
		if ( empty($arr_cus_id) || count($arr_cus_id) == 0 || $arr_cus_id[0] == null ) {
			$pamph_cus_id = '';
		} else {
			$pamph_cus_id = Input::get('pamph_cus_id'); //temp value
		}
			
        $dataInsert             = array(
            'pamph_number'      => Input::get('pamph_number'),
            'pamph_name'      	=> Input::get('pamph_name'),
            'pamph_kind'      	=> Input::get('pamph_kind', null),
            'pamph_class'      	=> Input::get('pamph_class', null),
            'pamph_cus_id'     	=> $pamph_cus_id,
            'pamph_send'      	=> Input::get('pamph_send'),
            'pamph_bunya_id'    => $pamph_bunya_id,
            'pamph_sex'      	=> Input::get('pamph_sex'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => INSERT,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );

        $dataInsert['pamph_pref'] 		= Input::get('pamph_pref');
        $dataInsert['pamph_area'] 		= Input::get('pamph_area');
        $dataInsert['pamph_bunya_name'] = Input::get('pamph_bunya_name');
        $dataInsert['pamph_cus_name'] 	= Input::get('pamph_cus_name');

        // set value for pamph_area_pref
        if ( $dataInsert['pamph_pref'] == 0 && $dataInsert['pamph_area'] == 0 ) {
        	$dataInsert['pamph_area'] = '';
        	$dataInsert['pamph_pref'] = '';
        } else {
        	$dataInsert['pamph_area'] = $dataInsert['pamph_area'];
        	$dataInsert['pamph_pref'] = $dataInsert['pamph_pref'];
        }

        $validator  = Validator::make($dataInsert, $clsPamphlet->Rules(), $clsPamphlet->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.pamphlets.regist')->withErrors($validator)->withInput();
        }

        // check select only pamph_pref and pamph_area
        if ( $dataInsert['pamph_pref'] != 0 && $dataInsert['pamph_area'] != 0 ) {
        	Session::flash('error-input', 'Please select only one 都道府県 or エリア');
        	return redirect()->route('backend.pamphlets.regist')->withErrors($validator)->withInput();
        } else {
        	$dataInsert['pamph_area'] = $dataInsert['pamph_area'];
        	$dataInsert['pamph_pref'] = $dataInsert['pamph_pref'];
        }

        // check select multi customer
        $arr_tmp_cus = array();
        foreach ( $pamph_cus_id as $item ) {
        	if ( isset($arr_tmp_cus[$item]) ) {
        		Session::flash('error-input-cus-exits', 'Exits! Please select customer only one in time!');
        		return redirect()->route('backend.pamphlets.regist')->withErrors($validator)->withInput();
        	}
        	$arr_tmp_cus[$item] = $item;
        }

        unset($dataInsert['pamph_pref']);
        unset($dataInsert['pamph_area']);
        unset($dataInsert['pamph_bunya_name']);
        unset($dataInsert['pamph_cus_name']);

		foreach ( $arr_cus_id as $item ) {
			$pamph_cus_id 					= $clsCustomer->get_by_code($item);
			$pamph_cus_id 					= $pamph_cus_id->cus_id;
			$dataInsert['pamph_cus_id'] 	= $pamph_cus_id;
        	$clsPamphlet->insert($dataInsert);
		}

        return redirect()->route('backend.pamphlets.index');
	}


	/**
	 * get view edit
	 * $id: id baitai record
	 */
	public function getEdit($id) {
		// search
		$data['s_pamph_number'] 			= Input::get('s_pamph_number');
		$data['s_pamph_name'] 				= Input::get('s_pamph_name');
		$data['s_pamph_kind_school'] 		= Input::get('s_pamph_kind_school');
		$data['s_pamph_kind_reserve'] 		= Input::get('s_pamph_kind_reserve');
		$data['s_pamph_kind_bundle'] 		= Input::get('s_pamph_kind_bundle');
		$data['s_pamph_class_unused'] 		= Input::get('s_pamph_class_unused');
		$data['s_pamph_class_used'] 		= Input::get('s_pamph_class_used');
		$data['s_pamph_cus_id'] 			= Input::get('s_pamph_cus_id');
		$data['s_pamph_send'] 				= Input::get('s_pamph_send');
		$data['s_pamph_bunya_id'] 			= Input::get('s_pamph_bunya_id');
		$data['s_pamph_pref'] 				= Input::get('s_pamph_pref');
		$data['s_pamph_area'] 				= Input::get('s_pamph_area');
		$data['s_pamph_sex_unspecified'] 	= Input::get('s_pamph_sex_unspecified');
		$data['s_pamph_sex_men'] 			= Input::get('s_pamph_sex_men');
		$data['s_pamph_sex_women'] 			= Input::get('s_pamph_sex_women');
		$data['page'] 						= Input::get('page');

		$clsPamphlet 		= new PamphletModel();
		$clsArea			= new AreaModel();
		$clsPref			= new PrefModel();
		$clsBunya 			= new BunyaModel();
		$clsCustomer 		= new CustomerModel();
		$data['pamphlet'] 	= $clsPamphlet->get_by_id($id);
		$data['prefs'] 		= $clsPref->get_for_select();
		$data['areas']		= $clsArea->get_for_select();
		$bunyas 			= $clsBunya->get_for_select();
		$customers 			= $clsCustomer->get_for_select();
		$data['title'] 		= '媒体情報の新規登録';

		// set value for complate bunyas
		foreach ( $bunyas as $bunya ) {
			$tmp[] = array(
				'value' => $bunya->bunya_code,
				'label' => $bunya->bunya_name,
				'desc' => $bunya->bunya_code . '_' . $bunya->bunya_name
			);
		}
		$data['bunyas'] = json_encode($tmp);

		// set value for complate customers
		foreach ( $customers as $customer ) {
			$tmp[] = array(
				'value' => $customer->cus_code,
				'label' => $customer->cus_name,
				'desc' => $customer->cus_code . '_' . $customer->cus_name
			);
		}
		$data['customers'] = json_encode($tmp);

		// set bunyas
		foreach ( $bunyas as $bunya ) {
			$tmp[$bunya->bunya_id] = $bunya->bunya_name;
		}
		$data['bunyas_old']			= $tmp;
		// set customers
		foreach ( $customers as $customer ) {
			$tmp[$customer->cus_id] = $customer->cus_name;
		}
		$data['customers_old']		= $tmp;

		if ( !empty(Input::get('type')) ) {
			$data['list_customers'] = $clsPamphlet->get_by_pamph_number(Input::get('type'));
		}
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';die;

		return view('backend.pamphlets.edit', $data);
	}


	/**
	 * update database
	 * $id: id baitai record
	 */
	public function postEdit($id) {
		$clsPamphlet            = new PamphletModel();
		$clsBunya 				= new BunyaModel();
		$clsCustomer 			= new CustomerModel();
		$pamph_bunya_id 		= $clsBunya->get_by_code(Input::get('pamph_bunya_id'));
		if ( empty($pamph_bunya_id) ) {
			$pamph_bunya_id 		= $clsBunya->get_by_id(Input::get('pamph_bunya_id'));
			$pamph_bunya_id 		= $pamph_bunya_id->bunya_id;
		} else {
			$pamph_bunya_id 		= $pamph_bunya_id->bunya_id;
		}

		$arr_cus_id 			= Input::get('pamph_cus_id');
		if ( empty($arr_cus_id) || count($arr_cus_id) == 0 || $arr_cus_id[0] == null ) {
			$pamph_cus_id = '';
		} else {
			$pamph_cus_id = Input::get('pamph_cus_id'); //temp value
		}
		// echo '<pre>';
		// print_r($pamph_cus_id);
		// echo '</pre>';die;
        $dataInsert             = array(
			'pamph_number'      => Input::get('pamph_number'),
			'pamph_name'      	=> Input::get('pamph_name'),
			'pamph_kind'      	=> Input::get('pamph_kind', null),
			'pamph_class'      	=> Input::get('pamph_class', null),
			'pamph_cus_id'     	=> $pamph_cus_id,
			'pamph_send'      	=> Input::get('pamph_send'),
			'pamph_bunya_id'    => $pamph_bunya_id,
			'pamph_sex'      	=> Input::get('pamph_sex'),

			'last_date'         => date('Y-m-d H:i:s'),
			'last_kind'         => INSERT,
			'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
			'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
        );
        $dataInsert['pamph_pref'] 		= Input::get('pamph_pref');
        $dataInsert['pamph_area'] 		= Input::get('pamph_area');
        $dataInsert['pamph_bunya_name'] = Input::get('pamph_bunya_name');
        $dataInsert['pamph_cus_name'] 	= Input::get('pamph_cus_name');

        // set value for pamph_area_pref
        if ( $dataInsert['pamph_pref'] != 0 && $dataInsert['pamph_area'] != 0 ) {
        	Session::flash('error-input', 'Please select only one 都道府県 or エリア');
        	return redirect()->route('backend.pamphlets.regist')->withErrors($validator)->withInput();
        } else {
        	$dataInsert['pamph_area'] = $dataInsert['pamph_area'];
        	$dataInsert['pamph_pref'] = $dataInsert['pamph_pref'];
        }

        $validator  = Validator::make($dataInsert, $clsPamphlet->Rules(), $clsPamphlet->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.pamphlets.edit', array($id, 
				's_pamph_number' 			=> Input::get('s_pamph_number'),
				's_pamph_name' 				=> Input::get('s_pamph_name'),
				's_pamph_kind_school' 		=> Input::get('s_pamph_kind_school', null),
				's_pamph_kind_reserve' 		=> Input::get('s_pamph_kind_reserve', null),
				's_pamph_kind_bundle' 		=> Input::get('s_pamph_kind_bundle'),
				's_pamph_class_unused' 		=> Input::get('s_pamph_class_unused'),
				's_pamph_class_used' 		=> Input::get('s_pamph_class_used'),
				's_pamph_cus_id' 			=> Input::get('s_pamph_cus_id'),
				's_pamph_send' 				=> Input::get('s_pamph_send'),
				's_pamph_bunya_id' 			=> Input::get('s_pamph_bunya_id'),
				's_pamph_pref' 				=> Input::get('s_pamph_pref'),
				's_pamph_sex_unspecified' 	=> Input::get('s_pamph_sex_unspecified'),
				's_pamph_sex_men' 			=> Input::get('s_pamph_sex_men'),
				's_pamph_sex_women' 		=> Input::get('s_pamph_sex_women'),
				's_pamph_area' 				=> Input::get('s_pamph_area'),
				'page' 						=> Input::get('page')
        	))->withErrors($validator)->withInput();
        }

        // check select only pamph_pref and pamph_area
        if ( $dataInsert['pamph_pref'] != 0 && $dataInsert['pamph_area'] != 0 ) {
        	Session::flash('error-input', 'Please select only one 都道府県 or エリア');
        	return redirect()->route('backend.pamphlets.edit', [$id, 
				's_pamph_number' 			=> Input::get('s_pamph_number'),
				's_pamph_name' 				=> Input::get('s_pamph_name'),
				's_pamph_kind_school' 		=> Input::get('s_pamph_kind_school', null),
				's_pamph_kind_reserve' 		=> Input::get('s_pamph_kind_reserve', null),
				's_pamph_kind_bundle' 		=> Input::get('s_pamph_kind_bundle'),
				's_pamph_class_unused' 		=> Input::get('s_pamph_class_unused'),
				's_pamph_class_used' 		=> Input::get('s_pamph_class_used'),
				's_pamph_cus_id' 			=> Input::get('s_pamph_cus_id'),
				's_pamph_send' 				=> Input::get('s_pamph_send'),
				's_pamph_bunya_id' 			=> Input::get('s_pamph_bunya_id'),
				's_pamph_pref' 				=> Input::get('s_pamph_pref'),
				's_pamph_sex_unspecified' 	=> Input::get('s_pamph_sex_unspecified'),
				's_pamph_sex_men' 			=> Input::get('s_pamph_sex_men'),
				's_pamph_sex_women' 		=> Input::get('s_pamph_sex_women'),
				's_pamph_area' 				=> Input::get('s_pamph_area'),
				'page' 						=> Input::get('page')
			])->withErrors($validator)->withInput();
        } else {
        	$dataInsert['pamph_area'] = $dataInsert['pamph_area'];
        	$dataInsert['pamph_pref'] = $dataInsert['pamph_pref'];
        }

        unset($dataInsert['pamph_pref']);
        unset($dataInsert['pamph_area']);
        unset($dataInsert['pamph_bunya_name']);
        unset($dataInsert['pamph_cus_name']);
echo '<pre>';
print_r($dataInsert);
echo '</pre>';die;
		$tmp = $dataInsert['pamph_cus_id'];
		foreach ( $tmp as $item ) {
			$dataInsert['pamph_cus_id'] = $item;
			$clsPamphlet->update($id, $dataInsert);
		}
        

        return redirect()->route('backend.pamphlets.index', array(
			's_pamph_number' 			=> Input::get('s_pamph_number'),
			's_pamph_name' 				=> Input::get('s_pamph_name'),
			's_pamph_kind_school' 		=> Input::get('s_pamph_kind_school', null),
			's_pamph_kind_reserve' 		=> Input::get('s_pamph_kind_reserve', null),
			's_pamph_kind_bundle' 		=> Input::get('s_pamph_kind_bundle'),
			's_pamph_class_unused' 		=> Input::get('s_pamph_class_unused'),
			's_pamph_class_used' 		=> Input::get('s_pamph_class_used'),
			's_pamph_cus_id' 			=> Input::get('s_pamph_cus_id'),
			's_pamph_send' 				=> Input::get('s_pamph_send'),
			's_pamph_bunya_id' 			=> Input::get('s_pamph_bunya_id'),
			's_pamph_pref' 				=> Input::get('s_pamph_pref'),
			's_pamph_sex_unspecified' 	=> Input::get('s_pamph_sex_unspecified'),
			's_pamph_sex_men' 			=> Input::get('s_pamph_sex_men'),
			's_pamph_sex_women' 		=> Input::get('s_pamph_sex_women'),
			's_pamph_area' 				=> Input::get('s_pamph_area'),
			'page' 						=> Input::get('page')
    	));
	}


	/**
	 * update database
	 * $id: id baitai record
	 */
	public function delete($id) {
		$clsPamphlet            = new PamphletModel();
		$dataUpdate 			= array(
			'last_date'         => date('Y-m-d H:i:s'),
			'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : 1,
		);

		// delete all
		if ( !empty(Input::get('type')) ) {
			$clsPamphlet->update_by_pamph_number(Input::get('type'), $dataUpdate);
		} else {
			$clsPamphlet->update($id, $dataUpdate);
		}

		// set page current
		$page = $this->set_page($clsPamphlet, Input::get('page'));

        return redirect()->route('backend.pamphlets.index', array(
    		's_pamph_number' 			=> Input::get('s_pamph_number'),
			's_pamph_name' 				=> Input::get('s_pamph_name'),
			's_pamph_kind_school' 		=> Input::get('s_pamph_kind_school', null),
			's_pamph_kind_reserve' 		=> Input::get('s_pamph_kind_reserve', null),
			's_pamph_kind_bundle' 		=> Input::get('s_pamph_kind_bundle'),
			's_pamph_class_unused' 		=> Input::get('s_pamph_class_unused'),
			's_pamph_class_used' 		=> Input::get('s_pamph_class_used'),
			's_pamph_cus_id' 			=> Input::get('s_pamph_cus_id'),
			's_pamph_send' 				=> Input::get('s_pamph_send'),
			's_pamph_bunya_id' 			=> Input::get('s_pamph_bunya_id'),
			's_pamph_pref' 				=> Input::get('s_pamph_pref'),
			's_pamph_sex_unspecified' 	=> Input::get('s_pamph_sex_unspecified'),
			's_pamph_sex_men' 			=> Input::get('s_pamph_sex_men'),
			's_pamph_sex_women' 		=> Input::get('s_pamph_sex_women'),
			's_pamph_area' 				=> Input::get('s_pamph_area'),
			'page' 						=> Input::get('page')
    	));
	}


	/**
	 * search and where
	 * return index()
	 */
	public function search()
	{
		// search
		$data['s_pamph_number'] 			= Input::get('s_pamph_number');
		$data['s_pamph_name'] 				= Input::get('s_pamph_name');
		$data['s_pamph_kind_school'] 		= Input::get('s_pamph_kind_school');
		$data['s_pamph_kind_reserve'] 		= Input::get('s_pamph_kind_reserve');
		$data['s_pamph_kind_bundle'] 		= Input::get('s_pamph_kind_bundle');
		$data['s_pamph_class_unused'] 		= Input::get('s_pamph_class_unused');
		$data['s_pamph_class_used'] 		= Input::get('s_pamph_class_used');
		$data['s_pamph_cus_id'] 			= Input::get('s_pamph_cus_id');
		$data['s_pamph_send'] 				= Input::get('s_pamph_send');
		$data['s_pamph_bunya_id'] 			= Input::get('s_pamph_bunya_id');
		$data['s_pamph_pref'] 				= Input::get('s_pamph_pref');
		$data['s_pamph_area'] 				= Input::get('s_pamph_area');
		$data['s_pamph_sex_unspecified'] 	= Input::get('s_pamph_sex_unspecified');
		$data['s_pamph_sex_men'] 			= Input::get('s_pamph_sex_men');
		$data['s_pamph_sex_women'] 			= Input::get('s_pamph_sex_women');
		$data['page'] 						= Input::get('page');

		// reset where
		if (Input::get('where') == 'null') {
			// search
			$data['s_pamph_number'] 			= null;
			$data['s_pamph_name'] 				= null;
			$data['s_pamph_kind_school'] 		= null;
			$data['s_pamph_kind_reserve'] 		= null;
			$data['s_pamph_kind_bundle'] 		= null;
			$data['s_pamph_class_unused'] 		= null;
			$data['s_pamph_class_used'] 		= null;
			$data['s_pamph_cus_id'] 			= null;
			$data['s_pamph_send'] 				= null;
			$data['s_pamph_bunya_id'] 			= null;
			$data['s_pamph_pref'] 				= null;
			$data['s_pamph_area'] 				= null;
			$data['s_pamph_sex_unspecified'] 	= null;
			$data['s_pamph_sex_men'] 			= null;
			$data['s_pamph_sex_women'] 			= null;

			return redirect()->route('backend.pamphlets.search');
		}

		$data['title'] 		= '媒体の検索';
		return view('backend.pamphlets.search', $data);
	}
}