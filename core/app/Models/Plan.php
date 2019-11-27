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








}
