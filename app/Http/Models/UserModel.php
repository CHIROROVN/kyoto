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
            'u_name'                    => 'required',
            'u_login'                   => 'required|unique:m_user',
            'u_passwd'                  => 'required|min:6',
            'u_power'                   => 'required',
            'u_belong'                  => 'required',
    		'currpasswd'                => 'required',
            'newpasswd'                 => 'required|alpha_num|min:6',
            'confnewpasswd'             => 'same:newpasswd',
		);
    }

    public function addRules()
    {
        return array(
            'u_name'                    => 'required',
            'u_login'                   => 'required|unique:m_user',
            'u_passwd'                  => 'required|min:6',
            'u_power'                   => 'required',
            'u_belong'                  => 'required',
        );
    }

    public function Messages()
    {
    	return array(
            'u_name.required'           => 'Please enter full name',
            'u_login.required'          => 'Please enter login ID',
            'u_passwd.required'         => 'Please enter password',
            'u_passwd.min'             => 'The password must be least 6 characters.',
            'u_belong.required'         => 'Please enter belong',
            'u_power.required'          => 'Please choose power',
            'u_login.unique'            => 'This login ID existed, try again!',
            'currpasswd.required'   	=> 'Please enter your current password.',
            'newpasswd.required'        => 'Please enter new password.',
            'newpasswd.alpha_num'       => 'Please enter new password must be alphanumeric characters.',
            'newpasswd.min'             => 'The new password must be least 6 characters.',
            'confnewpasswd.same'        => 'New password and confirm new password must be same.',
		);
    }

    public function get_all()
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('u_id', 'desc')->paginate(PAGINATION);
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function insert_get_id($data)
    {
        return DB::table($this->table)->insertGetId($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('u_id', $id)->first();
    }

    public function update($id, $data)
    {
    	return DB::table($this->table)->where('u_id', '=', $id)->update($data);
    }

    public function delete($id, $data)
    {
        return DB::table($this->table)->where('u_id', '=', $id)->update($data);
    }
}