<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $table = 'm_user';
    protected $primaryKey = 'u_id';
    public $timestamps  = false;
    // protected $redirectTo = 'sys-adm/login';

    public function getPasswordAttribute(){
        return $this->u_password;
    } 

    public function setPasswordAttribute($value){
        $this->u_password = $value;
    }
}
