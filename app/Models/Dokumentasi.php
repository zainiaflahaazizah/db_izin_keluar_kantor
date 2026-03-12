<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
        protected $primaryKey = 'id_dokumentasi';

    protected $fillable = [
        'id_pegawai',
        'id_izin',
        'foto',
        'latitude',
        'longitude',
    ];

        public function izin()
    {
        return $this->belongsTo(Izin::class, 'id_izin');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }

}
