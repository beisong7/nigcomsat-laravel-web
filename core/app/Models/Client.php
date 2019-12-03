<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;
    //

    protected $fillable = [
        'unid',
        'names',
        'email',
        'email_valid',
        'phone_valid',
        'phone',
        'passport',
        'username',
        'address',
        'active',
        'terms',
        'password',
        'seen_last',
        'countdown_pass',
        'reset_toke',
        'creator_key',
    ];

    public function hasAccess(){
        $status = false;
        if(empty($this->plan())){
            return $status;
        }
        if($this->plan()->end_date > time()){
            $status = true;
        }
        return $status;
    }

    public function plan(){
        return Plan::where('active', true)->where('creator_key', $this->unid)->first();
    }

    public function transactionId(){
        return $this->id."_test_id";
    }

    protected $hidden = [
        'password', 'remember_token',
    ];


}
