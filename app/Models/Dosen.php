<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = [
        'foto',
        'nidn',
        'nama',
        'email',
        'no_hp',
        'fakultas',
        'jabatan',
        'status_dosen',
        'alamat',
    ];

    public $timestamps = false;

    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class, 'dosen_id');
    }
}