<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'presensis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jumlah_absen',
        'tanggal_absen',
        'bonus_gaji',  
    ];
}
