<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'client_key',
        'unid',
        'reference',
        'plan_key',
        'sub_key',
        'kobo',
        'details',
        'success',
        'amount',
        'status',
        'gateway_message',
        'start',
        'ends',
    ];
}
