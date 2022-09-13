<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PingReq extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date_time',
        'http_response',
    ];
}
