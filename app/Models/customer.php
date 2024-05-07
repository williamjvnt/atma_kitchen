<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class customer extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    public $timestamps = false;
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_customer',
        'no_telepon_customer',
        'username',
        'password',
        'email_customer',
        'poin_customer',
        'tanggal_lahir_customer',
        'jumlah_saldo',
        'status',
        'verify_key',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];
}
