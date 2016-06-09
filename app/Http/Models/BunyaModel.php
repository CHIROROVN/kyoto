<?php namespace App\Http\Models;

use DB;

class BunyaModel
{
	protected $table = 'm_bunya';

    public function Rules()
    {
    	return array(
            'bunya_code'        => 'required',
            'bunya_name'        => 'required',
            'bunya_kind'        => 'required',
            'bunya_class'       => 'required',
		);
    }

    public function Messages()
    {
    	return array(
            
            'bunya_code.required'       => '※必須分野コード',
            'bunya_name.required'       => '※必須分野名',
            'bunya_kind.required'       => '※必須種類',
            'bunya_class.required'      => '※必須区分',
		);
    }

    public function get_all($pagination = true, $where = array())
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE);

        // where bunya_code
        if ( !empty($where['s_bunya_code']) ) {
            $results = $results->where('bunya_code', 'like', '%' . $where['s_bunya_code'] . '%');
        }

        // where bunya_name
        if ( !empty($where['s_bunya_name']) ) {
            $results = $results->where('bunya_name', 'like', '%' . $where['s_bunya_name'] . '%');
        }

        // where bunya_kind
        // (professional = 1) or (study = 2) or (professional or study); 
        if ( !empty($where['s_bunya_kind_pro']) && !empty($where['s_bunya_kind_stu']) ) {
            $results = $results->whereIn('bunya_kind', [1, 2]);
        } elseif ( !empty($where['s_bunya_kind_pro']) && empty($where['s_bunya_kind_stu']) ) {
            $results = $results->where('bunya_kind', '=', $where['s_bunya_kind_pro']);
        } elseif ( empty($where['s_bunya_kind_pro']) && !empty($where['s_bunya_kind_stu']) ) {
            $results = $results->where('bunya_kind', '=', $where['s_bunya_kind_stu']);
        }

        // where bunya_class
        // (main = 1) or (sub = 2) or (main or sub); 
        if ( !empty($where['s_bunya_class_main']) && !empty($where['s_bunya_class_sub']) ) {
            $results = $results->whereIn('bunya_class', [1, 2]);
        } elseif ( !empty($where['s_bunya_class_main']) && empty($where['s_bunya_class_sub']) ) {
            $results = $results->where('bunya_class', '=', $where['s_bunya_class_main']);
        } elseif ( empty($where['s_bunya_class_main']) && !empty($where['s_bunya_class_sub']) ) {
            $results = $results->where('bunya_class', '=', $where['s_bunya_class_sub']);
        }

        $results = $results->orderBy('bunya_code', 'asc');

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
        $results = DB::table($this->table)->where('bunya_id', $id)->first();
        return $results;
    }

    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('bunya_id', $id)->update($data);
        return $results;
    }
}