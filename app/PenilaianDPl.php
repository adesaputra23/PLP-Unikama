<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenilaianDPl extends Model
{
    public $incrementing = true;
    public $timestamps = false;
    protected $table = "penilaian_dpl";
    protected $primaryKey = 'id_penilaian_dpl';
    protected $keyType = 'bigint';

    public function JointoRkapAspekDpl()
    {
        return $this->hasMany('App\PnRkapAspekDpl', 'id_penilaian_dpl', 'id_penilaian_dpl');
    }

    public function JointoMhs()
    {
        return $this->hasOne('App\Mahasiswa', 'npm', 'npm');
    }

    public function JointoZonasi()
    {
        return $this->hasOne('App\ZonasiSekolah', 'id_zonasi', 'id_zonasi');
    }

    public function JointoZonasis()
    {
        return $this->hasOne('App\ZonasiSekolah', 'id_zonasi', 'id_zonasi');
    }

}
