<?php namespace App\Http\Models;

use DB;

class ContactModel
{
    protected $table = 't_contact';

    public function Rules()
    {
        return array(
            'cus_code'                      => 'required|unique:m_customer',
        );
    }

    public function Messages()
    {
    }

}