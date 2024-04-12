<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class withdraw extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'withdraw';
    protected $primaryKey = 'id_withdraw';
    protected $fillable = [
        'tanggal_withdraw',
        'jumlah_withdraw',
        'status_withdraw',
        'nama_bank',
        'nomor_rekening',
        'id_customer',
    ];
}
