<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemakaian_bahan_baku extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pemakaian_bahan_bakus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal',
        'jumlah_pemakaian',
        'id_bahan_baku',
    ];

    public function bahan_baku()
    {
        return $this->belongsTo(bahan_baku::class, 'id_bahan_baku', 'id');
    }
}
