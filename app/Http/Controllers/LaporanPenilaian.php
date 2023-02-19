<?php

namespace App\Http\Controllers;

use App\User;
use App\ZonasiSekolah;
use PDF;

class LaporanPenilaian extends Controller
{
    public function LaporanPenilaianSekolah()
    {
        $list_mhs_plp_1 = ZonasiSekolah::whereHas('JointoMhs', function($query){
            $query->where('jenis_plp', 1);
        })->get();
        $list_mhs_plp_2 = ZonasiSekolah::whereHas('JointoMhs', function($query){
            $query->where('jenis_plp', 2);
        })->get();
        // dd($list_mhs_plp_1);
        return view(
            'laporan_penilaian/laporan_penilaian_sekolah',
                compact(
                    'list_mhs_plp_1',
                    'list_mhs_plp_2',
                )
        );
    }

    public function LaporanPenilaianDpl()
    {
        $list_mhs_plp_2 = ZonasiSekolah::whereHas('JointoMhs', function($query){
            $query->where('jenis_plp', 2);
        })->get();
        $list_prodi = User::MAP_PRODI;
        return view(
            'laporan_penilaian/laporan_penilaian_dpl',
                compact(
                        'list_mhs_plp_2',
                        'list_prodi'
                    )
        );
    }

    public function RekapNilai()
    {
        $list_mhs_plp_1 = ZonasiSekolah::whereHas('JointoMhs', function($query){
            $query->where('jenis_plp', 1);
        })->get();
        $list_mhs_plp_2 = ZonasiSekolah::whereHas('JointoMhs', function($query){
            $query->where('jenis_plp', 2);
        })->get();
        $list_prodi = User::MAP_PRODI;
        return view(
            'laporan_penilaian/rekap_nilai',
                compact(
                        'list_mhs_plp_1',
                        'list_mhs_plp_2',
                        'list_prodi'
                    )
        );
    }

    public function CetakRekapNilai($jenis_plp = null)
    {
        $list_prodi = User::MAP_PRODI;
        if ($jenis_plp == 1) {
            $list_mhs_plp_1 = ZonasiSekolah::whereHas('JointoMhs', function($query){
                $query->where('jenis_plp', 1);
            })->get();
            $title = 'Rekap Nilai PLP I';
            $pdf = PDF::loadview('pdf_rakap_nilai/cetak_rekap_plp_1', 
                compact(
                    'title',
                    'list_mhs_plp_1',
                    'list_prodi',
                )
            )->setPaper('A4','landscape');
            return $pdf->stream();
        }else{
            $list_mhs_plp_2 = ZonasiSekolah::whereHas('JointoMhs', function($query){
                $query->where('jenis_plp', 2);
            })->get();
            $title = 'Rekap Nilai PLP II';
            $pdf = PDF::loadview('pdf_rakap_nilai/cetak_rekap_plp_2', 
                compact(
                    'title',
                    'list_mhs_plp_2',
                    'list_prodi',
                )
            )->setPaper('A4','landscape');
            return $pdf->stream();
        }
        return $jenis_plp;
    }
}
