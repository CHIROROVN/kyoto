<?php namespace App\Http\Models;

use DB;

class CustomerModel
{
	protected $table = 'm_customer';

    public function Rules()
    {
    	return array(
    		'cus_code'    	            => 'required',
            'cus_name'                  => 'required',
            'cus_title'                 => 'required',
            'cus_old_name'              => 'required',
            'cus_notice'                => 'required',
            'cus_pay'                   => 'required|numeric',
            'cus_kind'                  => 'required|numeric',
            'cus_owner'                 => 'required|numeric',
            'cus_sex'                   => 'required',
            'cus_login'                 => 'required',
            'cus_passwd'                => 'required',

            'cus_staff1_belong'         => 'required',
            'cus_staff1_name'           => 'required',
            'cus_staff1_name_kana'      => 'required|regex:/^[\x{3041}-\x{3096}]+$/u',
            'cus_staff1_tel'            => 'required',
            'cus_staff1_fax'            => 'required',
            'cus_staff1_email'          => 'required|email',

            'cus_staff2_belong'         => 'required',
            'cus_staff2_name'           => 'required',
            'cus_staff2_name_kana'      => 'required|regex:/^[\x{3041}-\x{3096}]+$/u',
            'cus_staff2_tel'            => 'required',
            'cus_staff2_fax'            => 'required',
            'cus_staff2_email'          => 'required|email',

            'cus_staff3_belong'         => 'required',
            'cus_staff3_name'           => 'required',
            'cus_staff3_name_kana'      => 'required|regex:/^[\x{3041}-\x{3096}]+$/u',
            'cus_staff3_tel'            => 'required',
            'cus_staff3_fax'            => 'required',
            'cus_staff3_email'          => 'required|email',

            'cus_mail_send'             => 'required|numeric',
            'cus_zip_pwd'               => 'required',
            'cus_mail_span'             => 'required|numeric',
            'cus_mail_youbi'            => 'required',
            'cus_mail_hi'               => 'required',
            'cus_mail_attach'           => 'required',
		);
    }

    public function Messages()
    {
    	return array(
            'cus_code.required'                  => '※必須',
            'cus_name.required'                  => '※必須',
            'cus_title.required'                 => '※必須',
            'cus_old_name.required'              => '※必須',
            'cus_notice.required'                => '※必須',
            'cus_pay.required'                   => '※必須',
            'cus_pay.numeric'                    => '※Format is number'
            'cus_kind.required'                  => '※必須',
            'cus_kind.numeric'                   => '※Format is number'
            'cus_owner.required'                 => '※必須',
            'cus_owner.numeric'                  => '※Format is number'
            'cus_sex.required'                   => '※必須',
            'cus_login.required'                 => '※必須',
            'cus_passwd.required'                => '※必須',

            'cus_staff1_belong.required'         => '※必須',
            'cus_staff1_name.required'           => '※必須',
            'cus_staff1_name_kana.required'      => '※必須',
            'cus_staff1_name_kana.regex'         => '※Format is Hiragana',
            'cus_staff1_tel.required'            => '※必須',
            'cus_staff1_fax.required'            => '※必須',
            'cus_staff1_email.required'          => '※必須',

            'cus_staff2_belong.required'         => '※必須',
            'cus_staff2_name.required'           => '※必須',
            'cus_staff2_name_kana.required'      => '※必須',
            'cus_staff2_name_kana.regex'         => '※Format is Hiragana',
            'cus_staff2_tel.required'            => '※必須',
            'cus_staff2_fax.required'            => '※必須',
            'cus_staff2_email.required'          => '※必須',

            'cus_staff3_belong.required'         => '※必須',
            'cus_staff3_name.required'           => '※必須',
            'cus_staff3_name_kana.required'      => '※必須',
            'cus_staff3_name_kana.regex'         => '※Format is Hiragana',
            'cus_staff3_tel.required'            => '※必須',
            'cus_staff3_fax.required'            => '※必須',
            'cus_staff3_email.required'          => '※必須',
            'cus_staff3_email.email'             => '※Format is email',

            'cus_mail_send.required'             => '※必須',
            'cus_mail_send.numeric'              => '※Format is number',
            'cus_zip_pwd.required'               => '※必須',
            'cus_mail_span.required'             => '※必須',
            'cus_mail_span.numeric'              => '※Format is number',
            'cus_mail_youbi.required'            => '※必須',
            'cus_mail_hi.required'               => '※必須',
            'cus_mail_attach.required'           => '※必須',
		);
    }

    public function get_all()
    {
        $results = DB::table($this->table)
                        ->where('last_kind', '<>', DELETE)
                        ->orderBy('cus_staff1_name_kana', 'asc')
                        ->orderBy('cus_staff2_name_kana', 'asc')
                        ->orderBy('cus_staff3_name_kana', 'asc')
                        ->paginate(PAGINATION);
        return $results;
    }

    public function insert($data)
    {
        $results = DB::table($this->table)->insert($data);
        return $results;
    }

    public function insert_get_id($data)
    {
        $results = DB::table($this->table)->insertGetId($data);
        return $results;
    }

    public function get_by_id($id)
    {
        $results = DB::table($this->table)->where('cus_id', $id)->first();
        return $results;
    }

    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('cus_id', $id)->update($data);
        return $results;
    }
}