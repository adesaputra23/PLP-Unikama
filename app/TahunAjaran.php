<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    public $incrementing = true;
    public $timestamps = false;
    protected $table = "tahun_ajaran";
    protected $primaryKey = 'id_tahun_ajran';
    protected $keyType = 'bigint';

    public static function AktifTahunAjaran(){
        $tahun_ajaran = self::where('status', 1)->first();
        return $tahun_ajaran;
    }
}
