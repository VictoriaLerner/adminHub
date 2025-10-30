<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AdminCredential extends Model
{
    protected $fillable = [
        'site_id',
        'login',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
