<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_transaksis';
    protected $fillable =[
        'jumlah_produk',
        'total_transaksi_produk',
        'id_produk',
        'id_transaksi',
        'id_hampers',
    ];
}
