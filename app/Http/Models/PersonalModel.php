<?php namespace App\Http\Models;

use DB;

class PersonalModel
{
	protected $table = 't_personal';

    public function Rules()
    {
    	return array(
    		'baitai_id'             => 'required',
            'per_fname'             => 'required',
            'per_gname'             => 'required',
            'per_fname_kana'        => 'required|regex:/^[\x{3041}-\x{3096}]+$/u',
            'per_gname_kana'        => 'required|regex:/^[\x{3041}-\x{3096}]+$/u',
            'per_email'             => 'required|email',
            'per_sex'               => 'required',
            'per_zipcode'           => 'required',
            'per_address1'          => 'required',
            'per_address2'          => 'required',
            'pamph_id'              => 'required',
		);
    }

    public function Messages()
    {
    	return array(
            'baitai_id.required'   	        => trans('validation.error_baitai_id_required'),
            'per_fname.required'            => trans('validation.error_per_fname_required'),
            'per_gname.required'            => trans('validation.error_per_gname_required'),
            'per_fname_kana.required'       => trans('validation.error_per_fname_kana_required'),
            'per_fname_kana.regex'          => trans('validation.error_per_fname_kana_regex'),
            'per_gname_kana.required'       => trans('validation.error_per_gname_kana_required'),
            'per_gname_kana.regex'          => trans('validation.error_per_gname_kana_regex'),
            'per_email.required'            => trans('validation.error_per_email_required'),
            'per_email.email'               => trans('validation.error_per_email_email'),
            'per_sex.required'              => trans('validation.error_per_sex_required'),
            'per_zipcode.required'          => trans('validation.error_per_zipcode_required'),
            'per_address1.required'         => trans('validation.error_per_address1_required'),
            'per_address2.required'         => trans('validation.error_per_address2_required'),
            'pamph_id.required'             => trans('validation.error_pamph_id_required'),
		);
    }

    public function get_all($pagination = true, $where = array())
    {
        $results = DB::table($this->table)
                    ->leftJoin('m_pref', 't_personal.per_pref_code', '=', 'm_pref.pref_code')
                    ->select('t_personal.*', 'm_pref.pref_code', 'm_pref.pref_name')
                    ->where('t_personal.last_kind', '<>', DELETE);

        // // where baitai_code
        // if ( !empty($where['s_baitai_code']) ) {
        //     $results = $results->where('baitai_code', 'like', '%' . $where['s_baitai_code'] . '%');
        // }

        // // where per_fname
        // if ( !empty($where['s_per_fname']) ) {
        //     $results = $results->where('per_fname', 'like', '%' . $where['s_per_fname'] . '%');
        // }

        // // where baitai_kind
        // // (old) or (new) or (old or new)
        // if ( !empty($where['s_baitai_kind_old']) && !empty($where['s_baitai_kind_new']) ) {
        //     $results = $results->whereIn('baitai_kind', [1, 2]);
        // } elseif ( !empty($where['s_baitai_kind_old']) && empty($where['s_baitai_kind_new']) ) {
        //     $results = $results->where('baitai_kind', '=', $where['s_baitai_kind_old']);
        // } elseif ( empty($where['s_baitai_kind_old']) && !empty($where['s_baitai_kind_new']) ) {
        //     $results = $results->where('baitai_kind', '=', $where['s_baitai_kind_new']);
        // }

        // // where baitai_year
        // // begin & end
        // if ( !empty($where['s_baitai_year_begin']) && !empty($where['s_baitai_year_end']) ) {
        //     $results = $results->where('baitai_year', '>=', $where['s_baitai_year_begin'])
        //                         ->where('baitai_year', '<=', $where['s_baitai_year_end']);
        // } elseif ( !empty($where['s_baitai_year_begin']) && empty($where['s_baitai_year_end']) ) {
        //     $results = $results->where('baitai_year', '>=', $where['s_baitai_year_begin']);
        // } elseif ( empty($where['s_baitai_year_begin']) && !empty($where['s_baitai_year_end']) ) {
        //     $results = $results->where('baitai_year', '<=', $where['s_baitai_year_end']);
        // }

        // $results = $results->orderBy('baitai_code', 'asc');

        // count record pagination
        $total_count = $results->count();

        if ($pagination) {
            $db = $results->simplePaginate(PAGINATION);//simplePaginate, paginate
        } else {
            $db = $results->get();
        }

        return array(
            'db'            => $db,
            'total_count'   => $total_count
        );
    }


    // public function get_for_select()
    // {
    //     $results = DB::table($this->table)->select('per_id', 'per_fname')->where('last_kind', '<>', DELETE)->orderBy('baitai_code', 'asc')->get();
    //     return $results;
    // }


    public function count() 
    {
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
        $results = DB::table($this->table)->where('per_id', $id)->first();
        return $results;
    }


    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('per_id', $id)->update($data);
        return $results;
    }
}