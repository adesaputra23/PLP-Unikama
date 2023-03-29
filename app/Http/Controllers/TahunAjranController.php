<?php

namespace App\Http\Controllers;

use App\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjranController extends Controller
{
    public function index()
    {
        $list_tahun_ajaran = TahunAjaran::all();
        return view('tahun_ajaran.index', compact('list_tahun_ajaran'));
    }

    public function Save(Request $request)
    {
        try {
            $cek_status = TahunAjaran::where('status', 1)->first();
            if (!empty($cek_status) && $request->status == 1) {
                $cek_status->status = 2;
                $cek_status->save();
            }
            if ($request->action == 'simpan') {
                $newData = new TahunAjaran();
                $newData->created_at = date('Y-m-d H:i:s');
                $newData->updated_at = null;
            }else{
                $newData = TahunAjaran::where('id_tahun_ajran', $request->id_tahun_ajaran)->first();
                $newData->updated_at = date('Y-m-d H:i:s');
            }
            $newData->tahun      = $request->tahun;
            $newData->name       = $request->nama;
            $newData->status     = $request->status;
            $newData->save();
            return redirect('tahun-ajaran')->with('toast_success', 'Data Berhasil Disimpan');
        } catch (\Throwable $th) {
            return redirect('tahun-ajaran')->with('toast_error', 'Data Gagal Disimpan'.$th->getMessage());
        }
    }

    public function Hapus(Request $request)
    {
        try {
            $tahun_ajaran = TahunAjaran::where('id_tahun_ajran', $request->id_tahun_ajaran)->first();
            $tahun_ajaran->delete();
            return redirect('tahun-ajaran')->with('toast_success', 'Data Berhasil Dihpus');
        } catch (\Throwable $th) {
            return redirect('tahun-ajaran')->with('toast_error', 'Data Gagal Dihapus'.$th->getMessage());
        }
    }
}
