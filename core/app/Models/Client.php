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
        $status = true;
//        if(empty($this->plan())){
//            return $status;
//        }
//        if($this->plan()->end_date > time()){
//            $status = true;
//        }
        return $status;
    }

    public function subs(){
        return $this->hasMany(Subscription::class, 'client_key', 'unid');
    }

    public function current_sub($key){
        $csub = Subscription::where('client_key', $this->unid)->where('active', true)->first();
        return !empty($csub)?$csub->$key:'No Active Subscription';
    }

    public function c_sub(){
        return Subscription::where('client_key', $this->unid)->where('active', true)->first();

    }

    public function transactionId(){
        return uniqid('TRANS_ID');
    }

    public function timeLeft(){
        $this->c_sub()->subTimeLeft();
    }

    protected $hidden = [
        'password', 'remember_token',
    ];


}
