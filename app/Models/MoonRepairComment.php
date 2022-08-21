<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoonRepairComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'writter',
        'comment',
        'deviceId',
        'status',
    ];
}
