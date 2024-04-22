<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kategori_produks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kategori_produk',
    ];
}
