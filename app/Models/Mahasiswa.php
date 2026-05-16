<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    public $timestamps = false;

   // app/Models/Mahasiswa.php

protected $fillable = [
    'NIM', 
    'nama', 
    'jurusan', 
    'angkatan', // Tambahkan ini
    'ipk',      // Tambahkan ini
    'status',   // Tambahkan ini
    'foto'
];

    // Tambahkan ini agar NIM tidak dianggap integer yang dipotong
    protected $casts = [
        'NIM' => 'string',
    ];
}