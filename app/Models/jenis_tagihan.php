<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_tagihan extends Model
{
    use HasFactory;
    protected $table = 'jenis_tagihan';
    protected $fillable = [
        'kode_tagihan',
        'nama_tagihan',
        'nominal',
        'periode',
        'keterangan',
        'status',
    ];
}
