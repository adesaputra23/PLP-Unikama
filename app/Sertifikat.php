<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    public $incrementing = true;
    public $timestamps = false;
    protected $table = "sertifikat";
    protected $primaryKey = 'id_sertifikat';
    protected $keyType = 'bigint';
}
