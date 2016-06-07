<?php namespace App\Http\Models;

use DB;

class BaitaiModel
{
	protected $table = 'm_baitai';

    public function Rules()
    {
    	return array(
    		'baitai_code'    	=> 'required',
            'baitai_name'       => 'required',
            'baitai_kind'       => 'required',
            'baitai_year'       => 'required|numeric',
		);
    }

    public function Messages()
    {
    	return array(
            'baitai_code.required'   	=> '※必須媒体コード',
            'baitai_name.required'      => '※必須媒体名',
            'baitai_kind.required'      => '※必須性別',
            'baitai_year.required'      => '※必須発行年',
            'baitai_year.numeric'       => '※Format is number 発行年',
		);
    }

    public function get_all($where = array())
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE);

        // where baitai_code
        if ( !empty($where['baitai_code']) ) {
            $results = $results->where('baitai_code', 'like', '%' . $where['baitai_code'] . '%');
        }

        // where baitai_name
        if ( !empty($where['baitai_name']) ) {
            $results = $results->where('baitai_name', 'like', '%' . $where['baitai_name'] . '%');
        }

        // where baitai_kind
        // (old) or (new) or (old or new)
        if ( !empty($where['baitai_kind_old']) && !empty($where['baitai_kind_new']) ) {
            $results = $results->whereIn('baitai_kind', [1, 2]);
        } elseif ( !empty($where['baitai_kind_old']) && empty($where['baitai_kind_new']) ) {
            $results = $results->where('baitai_kind', '=', $where['baitai_kind_old']);
        } elseif ( empty($where['baitai_kind_old']) && !empty($where['baitai_kind_new']) ) {
            $results = $results->where('baitai_kind', '=', $where['baitai_kind_new']);
        }

        // where baitai_year
        // begin & end
        if ( !empty($where['baitai_year_begin']) && !empty($where['baitai_year_end']) ) {
            $results = $results->where('baitai_year', '>=', $where['baitai_year_begin'])
                                ->where('baitai_year', '<=', $where['baitai_year_end']);
        } elseif ( !empty($where['baitai_year_begin']) && empty($where['baitai_year_end']) ) {
            $results = $results->where('baitai_year', '>=', $where['baitai_year_begin']);
        } elseif ( empty($where['baitai_year_begin']) && !empty($where['baitai_year_end']) ) {
            $results = $results->where('baitai_year', '<=', $where['baitai_year_end']);
        }

        $db = $results->orderBy('baitai_code', 'asc')->simplePaginate(PAGINATION);//simplePaginate, paginate

        return $db;
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
        $results = DB::table($this->table)->where('baitai_id', $id)->first();
        return $results;
    }

    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('baitai_id', $id)->update($data);
        return $results;
    }
}