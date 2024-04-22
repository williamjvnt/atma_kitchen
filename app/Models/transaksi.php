<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jumlah_transaksi_produk',
        'jumlah_poin_transaksi',
        'status_transaksi',
        'bukti_transaksi',
        'biaya_pengiriman',
        'tanggal_pesan',
        'tanggal_pelunasan',
        'tanggal_ambil',
        'jenis_pengiriman',
        'jumlah_tip',
        'id_customer',
    ];
}
