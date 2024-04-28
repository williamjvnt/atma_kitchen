<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'satuan_produk',
        'stok_produk',
        'id_kategori',
        'id_penitip',
    ];
}
