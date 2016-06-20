<?php namespace App\Http\Models;

use DB;

class ContactModel
{
    protected $table = 't_contact';

    public function Rules()
    {
        return array(
            'contact_title'                      => 'required',
            'contact_main'                       => 'required',
        );
    }

    public function Messages()
    {
        return array(
            'contact_title.required'             => 'required',
            'contact_main.required'              => 'required',
        );
    }

    public function get_all(){
        $query = DB::table($this->table)
                        ->where('last_kind', '<>', DELETE)
                        ->orderBy('contact_id', 'asc');
        return  $query->simplePaginate(PAGINATION);
    }

}