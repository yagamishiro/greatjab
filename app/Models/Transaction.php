<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobile_number',
        'amount',
        'service_fee',
        'balance',
        'service_type',
        'net_amount',
    ];
}
