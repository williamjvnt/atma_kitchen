<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'detail_transaksis';
    protected $fillable = [
        'jumlah_produk',
        'total_transaksi_produk',
        'id_produk',
        'id_transaksi',
        'id_hampers',
    ];

    public function produk()
    {
        return $this->belongsTo(produk::class, 'id_produk');
    }

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'id_transaksi');
    }

    public function hampers()
    {
        return $this->belongsTo(hampers::class, 'id_hampers');
    }
}
