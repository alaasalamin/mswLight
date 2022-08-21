<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'business',
        'model',
        'error',
        'description',
        'deviceStatus',
        'pinCode',
        'simCode',
        'accessories',
        'dataRecovery',
        'imei',
        'price',
        'tech',
        'status'
    ];
}
