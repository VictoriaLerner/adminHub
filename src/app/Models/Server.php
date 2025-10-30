<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Server extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'ip',
        'login',
        'password',
    ];


    protected $hidden = [
        'password',
    ];

}
