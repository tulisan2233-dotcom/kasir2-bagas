<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = [
        'kode_transaksi',
        'siswa_id',
        'jenis_tagihan_id',
        'guru_id',
        'metode_pembayaran_id',
        'jumlah_bayar',
        'tanggal_bayar',
        'keterangan',
    ];
}
