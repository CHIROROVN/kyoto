<?php namespace App\Http\Models;

use DB;

class ContactModel
{
    protected $table = 't_contact';
    protected $primaryKey = 'contact_id';
    public $timestamps  = false;

    public function Rules()
    {
        return array(
            'contact_title'                      => 'required',
            'contact_main'                       => 'required',
            'year'                               => 'required|numeric',
            'month'                              => 'required|numeric',
            'day'                                => 'required|numeric',
        );
    }

    public function Messages()
    {
        return array(
            'contact_title.required'             => trans('validation.error_stu_contact_title_required'),
            'contact_main.required'              => trans('validation.error_stu_contact_content_required'),
            'year.required'                      => trans('validation.error_stu_contact_year_required'),
            'year.numeric'                       => trans('validation.error_stu_contact_year_numeric'),
            'month.required'                     => trans('validation.error_stu_contact_month_required'),
            'month.numeric'                      => trans('validation.error_stu_contact_month_numeric'),
            'day.required'                       => trans('validation.error_stu_contact_day_required'),
            'day.numeric'                        => trans('validation.error_stu_contact_day_numeric'),
        );
    }

    public function get_all($stu_id=null){
        $query = DB::table($this->table)
                        ->where('last_kind', '<>', DELETE)
                        ->where('stu_id', '=', $stu_id)
                        ->orderBy('contact_id', 'asc');
        return  $query->simplePaginate(PAGINATION);
    }

    public function get_contact_by_id($stu_id=null, $contact_id=null){
        $query = DB::table($this->table)
                        ->where('last_kind', '<>', DELETE)
                        ->where('stu_id', '=', $stu_id)
                        ->where('contact_id', '=', $contact_id)
                        ->orderBy('contact_id', 'asc');
        return  $query->first();
    }

    public function insert($data)
    {
        $results = DB::table($this->table)->insert($data);
        return $results;
    }

    public function update($id, $data)
    {
        $results = DB::table($this->table)->where('contact_id', $id)->update($data);
        return $results;
    }
}