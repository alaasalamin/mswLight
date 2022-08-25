<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoonRepair extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'model',
        'error',
        'description',
        'status',
        'deviceStatus',
        'imei',
        'pinCode',
        'simCode',
        'dataRecovery',
        'tech',
        'customerName',
        'street',
        'zip',
        'city',
        'customerEmail',
        'customerPhoneNumber',
        'price',
        'accessories',
        'privateNumber',
        'company',
    ];
}
