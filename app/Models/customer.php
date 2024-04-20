<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_customer',
        'nomor_telepon_customer',
        'username',
        'password',
        'email_customer',
        'poin_customer',
        'tanggal_lahir_customer',
        'jumlah_saldo',
    ];
}
