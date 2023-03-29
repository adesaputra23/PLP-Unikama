<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function GetProdi($id_fakultas)
    {
        $list_prodi = Mahasiswa::MAP_ARRAY_PRODI[$id_fakultas];
        return response()->json($list_prodi);
    }
}
