<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'who',
        'unid',
        'first_name',
        'last_name',
        'email',
        'email_valid',
        'phone_valid',
        'phone',
        'passport',
        'username',
        'address',
        'office',
        'active',
        'password',
        'role_id',
        'seen_last',
        'countdown_pass',
        'reset_toke',
        'creator_key',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function names(){
        return $this->title . ' ' . $this->first_name . ' ' . $this->last_name;
    }

    public function image(){

        if(file_exists($this->photo)){
            return url($this->photo);
        }else{
            return url('icons/user.png');
        }

    }
}
