<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengadaan_bahan_baku extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pengadaan_bahan_bakus';
    protected $primaryKey = 'id';
    protected $fillable =[
        'tanggal_pengadaan',
        'harga_bahan_baku',
        'id_karyawan',
    ];
}
