<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'nip',
        'nip_bps',
        'jabatan',
        'wilayah',
        'status',
        'pendidikan',
        'tempat_lahir',
        'tanggal_lahir',
        'id_user',
    ];

     public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
