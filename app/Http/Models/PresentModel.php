<?php

namespace App\Http\Models;

use DB;

class PresentModel
{
	protected $table = 'm_presentlist';

    public function Rules()
    {
    	return array(
    		'present_code'    	=> 'required',
            'present_name'      => 'required',
		);
    }

    public function Messages()
    {
    	return array(
            'present_code.required'   	=> '※必須プレゼントコード',
            'present_name.required'     => '※必須プレゼント名',
		);
    }

    public function get_all()
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('presentlist_id', 'desc')->paginate(PAGINATION);
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
        $results = DB::table($this->table)->where('presentlist_id', $id)->first();
        return $results;
    }

    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('presentlist_id', $id)->update($data);
        return $results;
    }
}