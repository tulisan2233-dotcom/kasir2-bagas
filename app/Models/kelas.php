<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    
    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'jenjang_id',
        'jurusan_id',
        'status',
    ];

    public function jenjang()
    {
        return $this->belongsTo(jenjang::class, 'jenjang_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(jurusan::class, 'jurusan_id');
    }
}
