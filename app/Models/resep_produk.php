<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resep_produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'resep_produks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_resep',
        'id_produk',
    ];
}
