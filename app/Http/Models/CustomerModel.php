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
            'cus_pay.numeric'                    => '※Format is number',
            'cus_kind.required'                  => '※必須',
            'cus_kind.numeric'                   => '※Format is number',
            'cus_owner.required'                 => '※必須',
            'cus_owner.numeric'                  => '※Format is number',
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

    public function count() {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->count();
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

    //get list customer
    public function get_cus_by_kana($kana=null){
        if(!empty($kana)){
            // $arr_kana = $this->convert_kana($kana);
            // $where_kana = implode(" ", $arr_kana);

            switch ($kana) {
                case 'あ':
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%あ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%い%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%う%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%え%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%お%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;
                case 'か':
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%か%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%き%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%く%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%け%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%こ%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;
                case 'さ':
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%さ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%し%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%す%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%せ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%そ%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;
                case 'た':
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%た%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ち%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%つ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%て%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%と%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;
                case 'な':
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%な%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%に%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ぬ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ね%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%の%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;
                case 'は':
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%は%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ひ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ふ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%へ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ほ%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;
                case 'ま':
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ま%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%み%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%む%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%め%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%も%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;
                case 'や':
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%や%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ゆ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%よ%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;
                case 'ら':
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ら%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%り%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%る%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%れ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ろ%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;
                case 'わ':
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%わ%');
                                    $q->orWhere('cus_name_kana', 'LIKE', '%を%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;                
                default:
                return  DB::table($this->table)
                                ->where('last_kind', '<>', DELETE)
                                ->whereNotNull('last_kind')
                                ->where(function($q){
                                    $q->orWhere('cus_name_kana', 'LIKE', '%ん%');
                                })
                                ->lists('cus_name', 'cus_id');
                    break;
            }

           
            // return  DB::table($this->table)
            //                     ->where('last_kind', '<>', DELETE)
            //                     ->whereNotNull('last_kind')
            //                     ->where('cus_name_kana', 'LIKE', "%".$where_kana."%")
            //                     ->lists('cus_name', 'cus_id');
        }        
    }

//$q->whereRaw("(GroupId = 'KO11' OR GroupId = 'KO05')")

    public function convert_kana($kana=null){
        if(!empty($kana) ){
            switch ($kana) {
                case 'あ':
                    return ['あ','い','う','え','お'];                  
                    break;
                case 'か':
                    return ['か','き','く','け','こ'];
                    break;
                case 'さ':
                    return ['さ','し','す','せ','そ'];
                    break;
                case 'た':
                    return ['た','ち','つ','て','と'];
                    break;
                case 'な':
                    return ['な','に','ぬ','ね','の'];
                    break;
                case 'は':
                    return ['は','ひ','ふ','へ','ほ'];
                    break;
                case 'ま':
                    return ['ま','み','む','め','も'];
                    break;
                case 'や':
                    return ['や','ゆ','よ'];
                    break;
                case 'ら':
                    return ['ら','り','る','れ','ろ'];
                    break;
                case 'わ':
                    return ['わ','を'];
                    break;                
                default:
                    return ['ん'];
                    break;
            }
        }else{
            return null;
        }

    }
}