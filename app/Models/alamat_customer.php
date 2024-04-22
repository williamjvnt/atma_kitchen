<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat_customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'alamat_customers';
    protected $primaryKey = 'id';
    protected $fillable = [

        'lokasi',
        'jarak_ke_lokasi',
        'satuan_jarak',
        'id_customer',
    ];
}
