<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'karyawans';
    protected $fillable = [
        'nama_karyawan',
        'alamat_karyawan',
        'tanggal_lahir_karyawan',
        'nomor_telepon_karyawan',
        'username',
        'password',
        'total_gaji',
        'id_role',
        'id_presensi',
    ];

    public function role()
    {
        return $this->belongsTo(role::class, 'id_role');
    }

    public function presensi()
    {
        return $this->belongsTo(presensi::class, 'id_presensi');
    }
}
