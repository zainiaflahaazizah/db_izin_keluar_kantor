<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
        protected $primaryKey = 'id_dokumentasi';

    protected $fillable = [
        'id_izin',
        'foto',
        'latitude',
        'longitude',
    ];

        public function izin()
    {
        return $this->belongsTo(Izin::class, 'id_izin');
    }
}
