<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'satuan',
        'stok_produk',
        'id_kategori',
    ];
}
