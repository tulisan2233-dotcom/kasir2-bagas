<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metode_pembayaran extends Model
{
    use HasFactory;
    protected $table = 'metode_pembayaran';
    protected $fillable = [
        'kode_metode',
        'nama_metode',
        'keterangan',
        'status',
    ];
}
