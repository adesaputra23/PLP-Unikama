<?php

namespace App\Http\Controllers;

use App\Dpl;
use App\GuruPamong;
use App\KepalaSekolah;
use App\Mahasiswa;
use App\Sertifikat;
use App\User;
use PDF;

use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index(Request $request)
    {
        return view('sertifikat.index');
    }

    public function AddShow(Request $request)
    {
        try {
            $jenis_sertifikat = $request->jenis_sertifikat;
            if ($jenis_sertifikat == 1) {
                $npm = $request->npm;
                $mhs = Mahasiswa::where('npm', $npm)->first();
                if (empty($mhs)) {
                    return redirect('sertifikat/index')->with('toast_error', 'Belum Daftar');
                }

                if (empty($mhs->tgl_pembayaran)) {
                    return redirect('sertifikat/index')->with('toast_error', 'Belum Melakukan Pambayaran');
                }

                if (empty($mhs->tgl_verifikasi)) {
                    return redirect('sertifikat/index')->with('toast_error', 'Belum Diverifikasi oleh Admin');
                }

                if ($mhs->jenis_plp == 2) {
                    if (!empty($mhs->JointoPenilaian) && $mhs->JointoPenilaian->jumlah_na == null || $mhs->JointoPenilaian->nilai_kepsek == null) {
                        return redirect('sertifikat/index')->with('toast_error', 'Setifikat tidak bisa di cetak, karena masih dalam peroses Penilaian');
                    }
                    $get_sertifikat = Sertifikat::where('id_sertifikat', 1)->first();
                    if ($get_sertifikat->no_srt == 0) {
                        $get_sertifikat->no_srt = 1;
                    }else{
                        $get_sertifikat->no_srt = $get_sertifikat->no_srt + 1;
                    }
                    $get_sertifikat->tahun = date('Y');
                    $get_sertifikat->save();
                    return redirect()->route('sertifikat.mhs', $npm)->with('toast_success', 'Berhasil cetak sertifikat');
                }elseif ($mhs->jenis_plp == 1) {
                    if (!empty($mhs->JointoPenilaian) && $mhs->JointoPenilaian->jumlah_na == null) {
                        return redirect('sertifikat/index')->with('toast_error', 'Setifikat tidak bisa di cetak, karena masih dalam peroses Penilaian');
                    }
                    $get_sertifikat = Sertifikat::where('id_sertifikat', 1)->first();
                    if ($get_sertifikat->no_srt == 0) {
                        $get_sertifikat->no_srt = 1;
                    }else{
                        $get_sertifikat->no_srt = $get_sertifikat->no_srt + 1;
                    }
                    $get_sertifikat->tahun = date('Y');
                    $get_sertifikat->save();
                    return redirect()->route('sertifikat.mhs', $npm)->with('toast_success', 'Berhasil cetak sertifikat');
                }
                return redirect('sertifikat/index')->with('toast_error', 'Error : Gagal Menampilkan Data Sertifikat');
            }elseif ($jenis_sertifikat == 2) {
                $nik = $request->nik;
                $dpl = Dpl::where('nik', $nik)->first();
                if (empty($dpl)) {
                    return redirect('sertifikat/index')->with('toast_error', 'DPL Tidak Terdaftar');
                }
                $get_sertifikat = Sertifikat::where('id_sertifikat', 2)->first();
                if ($get_sertifikat->no_srt == 0) {
                    $get_sertifikat->no_srt = 1;
                }else{
                    $get_sertifikat->no_srt = $get_sertifikat->no_srt + 1;
                }
                $get_sertifikat->tahun = date('Y');
                $get_sertifikat->save();
                return redirect()->route('sertifikat.dpl', $nik)->with('toast_success', 'Berhasil cetak sertifikat');
            }elseif ($jenis_sertifikat == 3) {
                $nik = $request->nik;
                $gp = GuruPamong::where('nik', $nik)->first();
                if (empty($gp)) {
                    return redirect('sertifikat/index')->with('toast_error', 'Guru Pamong Tidak Terdaftar');
                }
                $get_sertifikat = Sertifikat::where('id_sertifikat', 3)->first();
                if ($get_sertifikat->no_srt == 0) {
                    $get_sertifikat->no_srt = 1;
                }else{
                    $get_sertifikat->no_srt = $get_sertifikat->no_srt + 1;
                }
                $get_sertifikat->tahun = date('Y');
                $get_sertifikat->save();
                return redirect()->route('sertifikat.guru_pamong', $nik)->with('toast_success', 'Berhasil cetak sertifikat');
            }else{
                $nik = $request->nik;
                $kp = KepalaSekolah::where('nik', $nik)->first();
                if (empty($kp)) {
                    return redirect('sertifikat/index')->with('toast_error', 'Kepala Sekolah Tidak Terdaftar');
                }
                $get_sertifikat = Sertifikat::where('id_sertifikat', 4)->first();
                if ($get_sertifikat->no_srt == 0) {
                    $get_sertifikat->no_srt = 1;
                }else{
                    $get_sertifikat->no_srt = $get_sertifikat->no_srt + 1;
                }
                $get_sertifikat->tahun = date('Y');
                $get_sertifikat->save();
                return redirect()->route('sertifikat.kepala_sekolah', $nik)->with('toast_success', 'Berhasil cetak sertifikat');
            }
            return redirect('sertifikat/index')->with('toast_error', 'Error : Gagal Menampilkan Data Sertifikat');
        } catch (\Throwable $th) {
            return redirect('sertifikat/index')->with('toast_error', 'Error : Gagal Menampilkan Data Sertifikat');
        }
    }

    public function SertifikatMhs($npm = null)
    {
        if ($npm == null) {
            return redirect('sertifikat/sertifikat_mhs')->with('toast_error', 'Error : Gagal Menampilkan Data Sertifikat');
        }
        $mhs = Mahasiswa::where('npm', $npm)->first();
        if (empty($mhs->JointoZonasi->JointoMitraSekolah)) {
            return redirect()->back()->with('toast_error', 'Sertifikat belum bisa di download');
        }
        $no_sertifikat = Sertifikat::where('id_sertifikat', 3)->first();
        $no_str = strlen($no_sertifikat->no_srt);
        if ($no_str == 1) {
            $no_str = '000'.$no_sertifikat->no_srt;
        }elseif ($no_str == 2) {
            $no_str = '00'.$no_sertifikat->no_srt;
        }elseif ($no_str == 3) {
            $no_str = '0'.$no_sertifikat->no_srt;
        }else{
            $no_str = $no_sertifikat->no_srt;
        }
        $fix_no_sertifikat = $no_str.'/DP2KI/A2.3/UK-ML/XII.'.$no_sertifikat->tahun;
        $list_prodi = User::MAP_PRODI;
        $title = 'Sertifikat Mahasiswa';
        $pdf = PDF::loadview('sertifikat/sertifikat_mhs', compact('title', 'mhs', 'fix_no_sertifikat', 'list_prodi'))->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function SertifikatDPL($nik = null)
    {
        if ($nik == null) {
            return redirect('sertifikat/index')->with('toast_error', 'Error : Gagal Menampilkan Data Sertifikat');
        }
        $dpl = Dpl::where('nik', $nik)->first();
        $jumlah_mahasiswa = count($dpl->JointoZonasis);
        $no_sertifikat = Sertifikat::where('id_sertifikat', 2)->first();
        $no_str = strlen($no_sertifikat->no_srt);
        if ($no_str == 1) {
            $no_str = '000'.$no_sertifikat->no_srt;
        }elseif ($no_str == 2) {
            $no_str = '00'.$no_sertifikat->no_srt;
        }elseif ($no_str == 3) {
            $no_str = '0'.$no_sertifikat->no_srt;
        }else{
            $no_str = $no_sertifikat->no_srt;
        }
        $fix_no_sertifikat = $no_str.'/DP2KI/A2.3/UK-ML/XII.'.$no_sertifikat->tahun;
        $list_prodi = User::MAP_PRODI;
        $title = 'Sertifikat DPL';
        $pdf = PDF::loadview('sertifikat/sertifikat_dpl', compact('title', 'dpl', 'fix_no_sertifikat', 'list_prodi', 'jumlah_mahasiswa'))->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function SertifikatGP($nik = null)
    {
        if ($nik == null) {
            return redirect('sertifikat/index')->with('toast_error', 'Error : Gagal Menampilkan Data Sertifikat');
        }
        $gp = GuruPamong::where('nik', $nik)->first();
        $jumlah_mahasiswa = count($gp->JointoZonasis);
        $no_sertifikat = Sertifikat::where('id_sertifikat', 3)->first();
        $no_str = strlen($no_sertifikat->no_srt);
        if ($no_str == 1) {
            $no_str = '000'.$no_sertifikat->no_srt;
        }elseif ($no_str == 2) {
            $no_str = '00'.$no_sertifikat->no_srt;
        }elseif ($no_str == 3) {
            $no_str = '0'.$no_sertifikat->no_srt;
        }else{
            $no_str = $no_sertifikat->no_srt;
        }
        $fix_no_sertifikat = $no_str.'/DP2KI/A2.3/UK-ML/XII.'.$no_sertifikat->tahun;
        $list_prodi = User::MAP_PRODI;
        $title = 'Sertifikat Guru Pamong';
        $pdf = PDF::loadview('sertifikat/sertifikat_gp', compact('title', 'gp', 'fix_no_sertifikat', 'list_prodi', 'jumlah_mahasiswa'))->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function SertifikatKP($nik = null)
    {
        if ($nik == null) {
            return redirect('sertifikat/index')->with('toast_error', 'Error : Gagal Menampilkan Data Sertifikat');
        }
        $kp = KepalaSekolah::where('nik', $nik)->first();
        $jumlah_mahasiswa = count($kp->JointoGuruPamongs);
        $no_sertifikat = Sertifikat::where('id_sertifikat', 4)->first();
        $no_str = strlen($no_sertifikat->no_srt);
        if ($no_str == 1) {
            $no_str = '000'.$no_sertifikat->no_srt;
        }elseif ($no_str == 2) {
            $no_str = '00'.$no_sertifikat->no_srt;
        }elseif ($no_str == 3) {
            $no_str = '0'.$no_sertifikat->no_srt;
        }else{
            $no_str = $no_sertifikat->no_srt;
        }
        $fix_no_sertifikat = $no_str.'/DP2KI/A2.3/UK-ML/XII.'.$no_sertifikat->tahun;
        $title = 'Sertifikat Kepala Sekolah';
        $pdf = PDF::loadview('sertifikat/sertifikat_kepala_sekolah', compact('title', 'kp', 'fix_no_sertifikat', 'jumlah_mahasiswa'))->setPaper('A4','landscape');
        return $pdf->stream();
    }
}
