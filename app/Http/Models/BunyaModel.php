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
            
            'bunya_code.required'       => '※必須',
            'bunya_name.required'       => '※必須',
            'bunya_kind.required'       => '※必須',
            'bunya_class.required'      => '※必須',
		);
    }

    public function get_all()
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('bunya_id', 'desc')->paginate(PAGINATION);
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