<?php namespace App\Http\Models;

use DB;

class PamphletModel
{
	protected $table = 'm_pamphlet';

    public function Rules()
    {
    	return array(
    		'pamph_number'    	=> 'required',
            'pamph_name'        => 'required',
            'pamph_kind'        => 'required|numeric',
            'pamph_class'       => 'required',
            'pamph_cus_id'      => 'required',
            'pamph_send'        => 'required',
            'pamph_bunya_id'    => 'required',
            'pamph_area_pref'   => 'required',
            'pamph_sex'         => 'required',
		);
    }

    public function Messages()
    {
    	return array(
            'pamph_number.required'   	    => '※必須資料請求番号',
            'pamph_name.required'           => '※必須資料名',
            'pamph_kind.required'           => '※必須種別',
            'pamph_class.required'          => '※必須使用区分',
            'pamph_cus_id.required'         => '※必須学校名',
            'pamph_send.required'           => '※必須発送の有無',
            'pamph_bunya_id.required'       => '※必須分野',
            'pamph_area_pref.required'      => '※必須都道府県・エリア',
            'pamph_sex.required'            => '※必須対象',
		);
    }

    public function get_all($pagination = true, $where = array())
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE);

        /*// where pamph_code
        if ( !empty($where['s_pamph_code']) ) {
            $results = $results->where('pamph_code', 'like', '%' . $where['s_pamph_code'] . '%');
        }

        // where pamph_name
        if ( !empty($where['s_pamph_name']) ) {
            $results = $results->where('pamph_name', 'like', '%' . $where['s_pamph_name'] . '%');
        }

        // where pamph_kind
        // (old) or (new) or (old or new)
        if ( !empty($where['s_pamph_kind_old']) && !empty($where['s_pamph_kind_new']) ) {
            $results = $results->whereIn('pamph_kind', [1, 2]);
        } elseif ( !empty($where['s_pamph_kind_old']) && empty($where['s_pamph_kind_new']) ) {
            $results = $results->where('pamph_kind', '=', $where['s_pamph_kind_old']);
        } elseif ( empty($where['s_pamph_kind_old']) && !empty($where['s_pamph_kind_new']) ) {
            $results = $results->where('pamph_kind', '=', $where['s_pamph_kind_new']);
        }

        // where pamph_year
        // begin & end
        if ( !empty($where['s_pamph_year_begin']) && !empty($where['s_pamph_year_end']) ) {
            $results = $results->where('pamph_year', '>=', $where['s_pamph_year_begin'])
                                ->where('pamph_year', '<=', $where['s_pamph_year_end']);
        } elseif ( !empty($where['s_pamph_year_begin']) && empty($where['s_pamph_year_end']) ) {
            $results = $results->where('pamph_year', '>=', $where['s_pamph_year_begin']);
        } elseif ( empty($where['s_pamph_year_begin']) && !empty($where['s_pamph_year_end']) ) {
            $results = $results->where('pamph_year', '<=', $where['s_pamph_year_end']);
        }*/

        $results = $results->orderBy('pamph_number', 'asc');

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

    public function get_all_distinct($pagination = true, $where = array())
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE);

        /*// where pamph_code
        if ( !empty($where['s_pamph_code']) ) {
            $results = $results->where('pamph_code', 'like', '%' . $where['s_pamph_code'] . '%');
        }

        // where pamph_name
        if ( !empty($where['s_pamph_name']) ) {
            $results = $results->where('pamph_name', 'like', '%' . $where['s_pamph_name'] . '%');
        }

        // where pamph_kind
        // (old) or (new) or (old or new)
        if ( !empty($where['s_pamph_kind_old']) && !empty($where['s_pamph_kind_new']) ) {
            $results = $results->whereIn('pamph_kind', [1, 2]);
        } elseif ( !empty($where['s_pamph_kind_old']) && empty($where['s_pamph_kind_new']) ) {
            $results = $results->where('pamph_kind', '=', $where['s_pamph_kind_old']);
        } elseif ( empty($where['s_pamph_kind_old']) && !empty($where['s_pamph_kind_new']) ) {
            $results = $results->where('pamph_kind', '=', $where['s_pamph_kind_new']);
        }

        // where pamph_year
        // begin & end
        if ( !empty($where['s_pamph_year_begin']) && !empty($where['s_pamph_year_end']) ) {
            $results = $results->where('pamph_year', '>=', $where['s_pamph_year_begin'])
                                ->where('pamph_year', '<=', $where['s_pamph_year_end']);
        } elseif ( !empty($where['s_pamph_year_begin']) && empty($where['s_pamph_year_end']) ) {
            $results = $results->where('pamph_year', '>=', $where['s_pamph_year_begin']);
        } elseif ( empty($where['s_pamph_year_begin']) && !empty($where['s_pamph_year_end']) ) {
            $results = $results->where('pamph_year', '<=', $where['s_pamph_year_end']);
        }*/

        $results = $results->orderBy('pamph_number', 'asc');

        // count record pagination
        $total_count = $results->count();

        if ($pagination) {
            $db = $results->distinct('pamph_number')->simplePaginate(PAGINATION);//simplePaginate, paginate
        } else {
            $db = $results->distinct('pamph_number')->get();
        }

        return array(
            'db'            => $db,
            'total_count'   => $total_count
        );
    }


    public function get_for_select()
    {
        $results = DB::table($this->table)->select('pamph_id', 'pamph_name')->where('last_kind', '<>', DELETE)->get();
        return $results;
    }


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
        $results = DB::table($this->table)->where('pamph_id', $id)->first();
        return $results;
    }


    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('pamph_id', $id)->update($data);
        return $results;
    }
}