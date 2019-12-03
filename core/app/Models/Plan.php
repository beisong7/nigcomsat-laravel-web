<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $fillable=[
        'unid',
        'name',
        'type',
        'cost',
        'duration',
        'duration_type',
        'active',
        'creator_key',
        'end_date',
        'start_date',
    ];

    public function daysLeft(){
        if($this->end_date < time()){
            return 'Expired';
        }
        $delta = $this->end_date - time();
        $aday = 60*60*24;
        return intval($delta/$aday). " day(s) left";
    }








}
