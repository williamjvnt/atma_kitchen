<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_hampers extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_hampers';
    protected $fillable = [
        'id_hampers',
        'id_produk',
    ];

    public function hampers()
    {
        return $this->belongsTo(hampers::class, 'id_hampers');
    }

    public function produk()
    {
        return $this->belongsTo(produk::class, 'id_produk');
    }
}
