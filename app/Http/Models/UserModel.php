<?php namespace App\Http\Models;

use DB;

class UserModel
{
    protected $table = 'm_user';
    protected $primaryKey = 'u_id';
    public $timestamps  = false;

    public function Rules()
    {
    	return array(
    		'currpasswd'                => 'required',
            'newpasswd'                 => 'required|alpha_num|min:6',
            'confnewpasswd'             => 'same:newpasswd',
		);
    }

    public function Messages()
    {
    	return array(
            'currpasswd.required'   	=> 'Please enter your current password.',
            'newpasswd.required'        => 'Please enter new password.',
            'newpasswd.alpha_num'       => 'Please enter new password must be alphanumeric characters.',
            'newpasswd.min'             => 'Please enter new password must be least 6 characters.',
            'confnewpasswd.same'        => 'New password and confirm new password must be same.',


		);
    }

    public function get_all()
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('u_id', 'desc')->paginate(PAGINATION);
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
        $results = DB::table($this->table)->where('u_id', $id)->first();
        return $results;
    }

    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('u_id', '=', $id)->update($data);
        return $results;
    }
}