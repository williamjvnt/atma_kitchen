<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hampers extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hampers';
    protected $primaryKey = 'id_hampers';
    protected $fillable = [
        'nama_hampers',
        'harga_hampers',
        'id_bahan_baku',
    ];
}
