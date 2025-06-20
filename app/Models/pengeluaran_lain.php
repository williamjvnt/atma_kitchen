<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran_lain extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran_lains';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_pengeluaran',
        'nominal_pengeluaran',
        'id_karyawan',
    ];
}
