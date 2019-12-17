<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $fillable=[
        'unid',
        'name',
        'info',
        'type',
        'cost',
        'price',
        'duration',
        'duration_info',
        'active',
        'default',
        'creator_key',
    ];

    public function days(){
        $aday = 60*60*24;
        $days = intval($this->duration/$aday);
        $hours = $this->duration%$aday;
        return $days. " day(s) ".$hours. " hours";
    }

    public function prices(){
        return $this->price * 100;
    }










}
