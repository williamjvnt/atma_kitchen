<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penitip extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'penitip';
    protected $primaryKey = 'id_penitip';

    protected $fillable = [
        'nama_penitip',
        'tanggal_penitip',
        'id_produk',
    ];
}
