<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pengadaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_pengadaans';
    protected $fillable = [
        'jumlah_detail_pengadaan',
        'subtotal_detail_pengadaan',
        'id_pengadaan',
        'id_bahan_baku',
    ];
}
