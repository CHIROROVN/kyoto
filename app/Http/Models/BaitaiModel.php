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
            'baitai_code.required'   	=> '※必須',
            'baitai_name.required'      => '※必須',
            'baitai_kind.required'      => '※必須',
            'baitai_year.required'      => '※必須',
            'baitai_year.numeric'       => '※Format is number',
		);
    }

    public function get_all()
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('baitai_id', 'desc')->paginate(PAGINATION);
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
        $results = DB::table($this->table)->where('baitai_id', $id)->first();
        return $results;
    }

    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('baitai_id', $id)->update($data);
        return $results;
    }
}