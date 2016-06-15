<?php namespace App\Http\Models;

use DB;

class EnterpriseModel
{
    protected $table = 'm_enterprise';

    public function Rules()
    {
        return array(
            'ent_name'         => 'required',
            'ent_login'        => 'required|unique:m_enterprise',
            'ent_passwd'       => 'required',
        );
    }

    public function Messages()
    {
        return array(
            'ent_name.required'         => 'Please enter enterprise nam',
            'ent_login.required'        => 'Please enter enterprise login id',
            'ent_login.unique'          => 'This login id existed, try again.',
            'ent_passwd.required'       => 'Please enter enterprise password',
        );
    }

    public function get_all()
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('ent_id', 'desc')->paginate(PAGINATION);
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
        $results = DB::table($this->table)->where('ent_id', $id)->first();
        return $results;
    }

    public function find_max_id()
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->max('ent_id');
    }

    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('ent_id', $id)->update($data);
        return $results;
    }
}