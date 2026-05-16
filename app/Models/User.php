<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

   // app/Models/User.php

protected $fillable = [
    'username',
    'password',
    'nama_lengkap',
];

    public $timestamps = false;
}