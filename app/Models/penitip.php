<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penitip extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'penitips';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_penitip',
        'tanggal_menitip',
    ];
}
