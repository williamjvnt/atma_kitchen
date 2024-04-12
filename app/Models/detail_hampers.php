<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_hampers extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_hampers';
    protected $fillable = [
        'jumlah_produk',
        'id_hampers',
        'id_produk',
    ];
}
