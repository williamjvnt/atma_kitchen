<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pengadaan extends Model
{
    use HasFactory;
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'detail_pengadaans';
    protected $fillable = [
        'jumlah_detail_pengadaan',
        'subTotal_detail_pengadaan',
        'id_pengadaan',
        'id_bahan_baku',
    ];
    public function pengadaan()
    {
        return $this->belongsTo(pengadaan_bahan_baku::class, 'id_pengadaan');
    }

    public function bahan_baku()
    {
        return $this->belongsTo(bahan_baku::class, 'id_bahan_baku');
    }
}
