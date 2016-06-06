<?php namespace App\Http\Models;

use DB;

class EnterpriseModel
{
	protected $table = 'm_enterprise';

    public function Rules()
    {
    	return array(
    		'ent_name'    	   => 'required',
            'ent_login'        => 'required',
            'ent_passwd'       => 'required',
		);
    }

    public function Messages()
    {
    	return array(
            'ent_name.required'   	    => '※必須',
            'ent_login.required'        => '※必須',
            'ent_passwd.required'       => '※必須',
		);
    }

    public function get_all()
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('ent_id', 'desc')->paginate(PAGINATION);
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
        $results = DB::table($this->table)->where('ent_id', $id)->first();
        return $results;
    }

    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('ent_id', $id)->update($data);
        return $results;
    }
}