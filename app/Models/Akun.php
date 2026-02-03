<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akuns';

    protected $primaryKey = 'id_akun';

    protected $fillable = [
        'username',
        'password',
        'role'
    ];
}
