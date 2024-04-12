<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kategori_produk';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'nama_kategori_produk',
    ];
}
