<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahan_baku extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_bahan_baku',
        'stok_bahan_baku',
        'min_stok_bahan_baku',
        'satuan_bahan_baku',
    ];
    
}
