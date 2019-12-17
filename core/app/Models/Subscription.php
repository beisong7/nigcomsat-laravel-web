<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //

    protected $fillable = [
        'unid',
        'plan_key',
        'client_key',
        'payment_key',
        'active',
        'end_date',
        'start_date',
        'duration',
        'duration_type',
    ];

    public function plan(){
        return $this->hasOne(Plan::class, 'unid', 'plan_key');
    }

    public function daysLeft(){
        if($this->end_date < time()){
            return 'Expired';
        }
        $delta = $this->end_date - time();
        $aday = 60*60*24;


        $days = intval($delta/$aday);
        //subtract days x aday from end day

        $hours = $this->end_date - ($aday * $days) - time();
        $oneHr = 60*60;
        $hours = intval($hours/$oneHr);

        return $days. " day(s) ".$hours. " hours left";
//        return intval($delta/$aday). " day(s) left";
    }

    public function days(){
        $aday = 60*60*24;
        $days = intval($this->duration/$aday);
        $hours = $this->duration%$aday;
        return $days. " day(s) ".$hours. " hours";
    }

    public function client(){
        return $this->hasOne(Client::class, 'unid', 'client_key');
    }

    public function status(){
        $status = false;
        if(empty($this->plan())){
            $status = false;
        }
        if($this->end_date > time()){
            $status = true;
        }
        return $status?'Active':'In Active';
    }

    public function subTimeLeft(){
        if($this->end_date < time()){
            return 0;
        }
        return $this->end_date - time();
    }
}
