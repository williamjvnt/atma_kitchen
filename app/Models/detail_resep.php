<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_resep extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_reseps';
    protected $fillable = [
        'jumlah_bahan',
        'id_bahan_baku',
        'id_resep',
    ];
}
