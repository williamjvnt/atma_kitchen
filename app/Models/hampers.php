<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hampers extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hampers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_hampers',
        'harga_hampers',
        'gambar_hampers',
        'id_bahan_baku',
    ];
}
