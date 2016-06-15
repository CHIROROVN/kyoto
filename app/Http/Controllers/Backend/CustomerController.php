<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\CustomerModel;
use Input;
use Session;
use Validator;
use Auth;
use LaravelLocalization;

class CustomerController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * get Customer index
     */
    public function index() {
        $clsCustomer                = new CustomerModel();

        $where['cus_code']          = Input::get('cus_code');
        $where['cus_name']          = Input::get('cus_name');
        $where['cus_old_name']      = Input::get('cus_old_name');

        $data['title']              = '顧客情報の検索結果一覧';
        $data['customers']          = $clsCustomer->get_all($where);
        $data['count_all']          = $clsCustomer->count();
        $data['total_count']        = count($clsCustomer->get_all($where));
        
        $page_current               = Input::get('page') ? Input::get('page') : '1';
        if($data['total_count'] == 0){
            $data['record_from']    = 0;
            $data['record_to']      = 0;
        }else{
            $data['record_from']    = (($page_current - 1) * PAGINATION) + 1;
            $data['record_to']      = $data['record_from'] - 1;
        }
        return view('backend.customers.index', $data);
    }


    public function search()
    {
        $data['title']            = '顧客の検索';
        $data['cus_code']         = Input::get('cus_code');
        $data['cus_name']         = Input::get('cus_name');
        $data['cus_old_name']     = Input::get('cus_old_name');

        return view('backend.customers.search', $data);
    }

    public function postSearch()
    {
        $data['cus_code']         = Input::get('cus_code');
        $data['cus_name']         = Input::get('cus_name');
        $data['cus_old_name']     = Input::get('cus_old_name');

       return redirect()->route('backend.customers.index', $data);
    }

    /**
     * call view customer regist
    */
    public function getRegist() {
        $data['title']        = '顧客情報の新規登録';
        return view('backend.customers.regist', $data);
    }

    public function postRegist() {
        $clsCustomer                    = new CustomerModel();
        $dataInsert                     = array(
            'cus_code'                  => Input::get('cus_code'),
            'cus_name'                  => Input::get('cus_name'),
            'cus_name_kana'             => Input::get('cus_name_kana'),
            'cus_title'                 => Input::get('cus_title'),
            'cus_old_name'              => Input::get('cus_old_name'),
            'ent_id'                    => Input::get('ent_id'),
            'cus_notice'                => Input::get('cus_notice'),
            'cus_kind'                  => Input::get('cus_kind'),
            'cus_owner'                 => Input::get('cus_owner'),
            'cus_pay'                   => Input::get('cus_pay'),
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

            // 'cus_mail_send'             => Input::get('cus_mail_send'),
            // 'cus_zip_pwd'               => Input::get('cus_zip_pwd'),
            // 'cus_mail_span'             => Input::get('cus_mail_span'),
            // 'cus_mail_youbi'            => Input::get('cus_mail_youbi'),
            // 'cus_mail_hi'               => Input::get('cus_mail_hi'),
            // 'cus_mail_attach'           => Input::get('cus_mail_attach'),

            'last_date'                 => date('Y-m-d H:i:s'),
            'last_kind'                 => INSERT,
            'last_ipadrs'               => CLIENT_IP_ADRS,
            'last_user'                 => (Auth::check()) ? Auth::user()->u_id : '',
        );

        $validator  = Validator::make($dataInsert, $clsCustomer->Rules(), $clsCustomer->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.customers.regist')->withErrors($validator)->withInput();
        }

        if ( $clsCustomer->insert($dataInsert) ) {
            Session::flash('success', 'The customer registed successfully.');
            return redirect()->route('backend.customers.index');
        } else {
            Session::flash('danger', 'The customer regist faild, try again!');
            return redirect()->route('backend.customers.regist')->with('title', $title);
        }
	}


	public function getEdit($id) {
		$clsCustomer 		= new CustomerModel();
		$data['customer'] 	= $clsCustomer->get_by_id($id);
		$data['title'] 		= '顧客情報の新規登録';
        if($data['customer'] == null) return redirect()->route('backend.customers.index')->with($data);

		return view('backend.customers.edit', $data);
	}

	public function postEdit($id) {
		$clsCustomer   = new CustomerModel();
        $dataCus       = $clsCustomer->get_by_id($id);
        $rules         = $clsCustomer->Rules();

        if($dataCus->cus_code == Input::get('cus_code')) unset($rules['cus_code']);

        $dataUpdate             = array(
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

            // 'cus_mail_send'             => Input::get('cus_mail_send'),
            // 'cus_zip_pwd'               => Input::get('cus_zip_pwd'),
            // 'cus_mail_span'             => Input::get('cus_mail_span'),
            // 'cus_mail_youbi'            => Input::get('cus_mail_youbi'),
            // 'cus_mail_hi'               => Input::get('cus_mail_hi'),
            // 'cus_mail_attach'           => Input::get('cus_mail_attach'),

            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => UPDATE,
            'last_ipadrs'       => CLIENT_IP_ADRS,
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : '',
        );

        $validator  = Validator::make(Input::all(), $rules, $clsCustomer->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.customers.edit', $id)->withErrors($validator)->withInput();
        }

        if ( $clsCustomer->update($id, $dataUpdate) ) {
            Session::flash('success', 'The customer updated successfully.');
            return redirect()->route('backend.customers.index');
        } else {
            Session::flash('danger', 'The customer updated faild, try again!');
            return redirect()->route('backend.customers.edit', $id)->with('title', $title);
        }
    }

    public function delete($id) {
        $clsCustomer            = new CustomerModel();
        $data['title']          = '顧客情報の検索結果一覧';
        $dataUpdate             = array(
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => DELETE,
            'last_ipadrs'       => CLIENT_IP_ADRS,
            'last_user'         => (Auth::check()) ? Auth::user()->u_id : '',
        );

        if ( $clsCustomer->update($id, $dataUpdate) ) {
            Session::flash('success', 'The customer deleted successfully.');
            // set page current
            $page = $this->set_page($clsCustomer, Input::get('page'));
            return redirect()->route('backend.customers.index', ['page' => $page]);
        } else {
            Session::flash('danger', 'The customer delete faild, try again!');
            return redirect()->route('backend.customers.index')->with('title', $title);
        }
        ;
    }

    public function detail($id){
        $data['title']          = '登録済み顧客情報の参照';
        $clsCustomer            = new CustomerModel();
        $data['customer']       = $clsCustomer->get_by_id($id);
        return view('backend.customers.detail', $data);
    }
}