<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'mata_pelajaran',
        'no_telpon',
        'username',
        'password',
        'role',
        'status',
    ];

}
