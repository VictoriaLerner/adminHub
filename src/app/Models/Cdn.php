<?php

namespace App\Models;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Cdn extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'login',
        'password',
    ];


    protected $hidden = [
        'password',
    ];

    public function getDecryptedPasswordAttribute(): ?string
    {
        if (!$this->password) {
            return null;
        }

        try {
            return Crypt::decryptString($this->password);
        } catch (\Exception $e) {
            return null;
        }
    }
}
