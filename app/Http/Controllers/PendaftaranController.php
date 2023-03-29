<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\User;
use App\UserRole;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    public function index(){
        $list_fakultas = Mahasiswa::MAP_FAKULTAS;
        return view('pendaftaran', compact('list_fakultas'));
    }

    public function Pendaftaran(Request $request)
    {
        $newSiswa = new Mahasiswa();
        $newSiswa->npm              = $request->npm;
        $newSiswa->nama_mhs         = $request->nama;
        $newSiswa->program_studi    = $request->prodi;
        $newSiswa->fakultas         = $request->fakultas;
        $newSiswa->angkatan         = $request->angkatan;
        $newSiswa->ipk              = $request->ipk;
        $newSiswa->kelas            = $request->kelas;
        $newSiswa->agama            = $request->agama;
        $newSiswa->jenis_kelamin    = $request->jenis_kelamin;
        $newSiswa->alamat           = $request->alamat;
        $newSiswa->jenis_plp        = $request->jenis_plp;
        $newSiswa->no_hp            = $request->no_hp;
        $newSiswa->tgl_pendaftaran  = date('Y-m-d H:i:s');
        $newSiswa->created_at       = date('Y-m-d H:i:s');

        if (!empty($newSiswa) && $newSiswa->npm) {
            $mhs = Mahasiswa::where('npm', $request->npm)->first();
            if (empty($mhs)) {
                if (in_array($newSiswa->jenis_plp, [1,2])) {
                    if ($newSiswa->jenis_plp == 1 && $newSiswa->ipk < 2.50) {
                        return redirect()->route('pendaftaran-plp')->with('toast_error', 'Gagal, IPK anda kurang');
                    }elseif ($newSiswa->jenis_plp == 2 && $newSiswa->ipk < 2.80) {
                        return redirect()->route('pendaftaran-plp')->with('toast_error', 'Gagal, IPK anda kurang');
                    }
                    if ($newSiswa->save()) {
                        $user = new User();
                        $user->nik          = $newSiswa->npm;
                        $user->password     = Hash::make($newSiswa->npm);
                        $user->created_at   = date('Y-m-d H:i:s');
                        $user->updated_at   = date('Y-m-d H:i:s');
                        $user->save();
            
                        $role       = new UserRole();
                        $role->nik  = $newSiswa->npm;
                        $role->role = 5;
                        $role->save();
                    }
                    $status = 0;
                    return redirect()->route('show', ['id' => $newSiswa->id_mhs, 'status' => $status])->with('toast_success', 'Berhasil daftar');
                }
            }
            $status = 1;
            return redirect()->route('show', ['id' => $mhs->id_mhs, 'status' => $status])->with('toast_error', 'Anda sudah terdaftar');
        }
    }

    public function show($id = null, $status = null)
    {
        $list_prodi = User::MAP_PRODI;
        $list_fakultas = User::MAP_FAKULTAS;
        $mhs = Mahasiswa::where('id_mhs', $id)->first();
        return view('show_pendaftaran', compact('mhs', 'status'));
    }

    public function Pdf($id = null, $status = null)
    {
        $list_prodi = User::MAP_PRODI;
        $list_fakultas = User::MAP_FAKULTAS;
        $mhs = Mahasiswa::where('id_mhs', $id)->first();
        $title = 'Pendaftaran PDF';
        $pdf = PDF::loadview('pdf_pendaftaran', compact('list_prodi', 'list_fakultas', 'mhs', 'title', 'status'))->setPaper('A4','potrait');
        return $pdf->stream();
    }

    // upload bukti pembayaran
    public function UploadBuktiPembayaran(Request $request)
    {
        return view('upload_bukti_pembayaran');
    }

    public function UploadBuktiPembayaranMhs()
    {
        $user = Auth::user()->get_mahasiswa;
        return view('mahasiswa.upload_bukti_pembayaran', compact('user'));
    }

    public function UploadBuktiPembayaranSave(Request $request)
    {
        $mhs = Mahasiswa::where('npm', $request->npm)->first();
        if (empty($mhs)) {
            return redirect()->route('upload-bukti-pembayaran-mahasiswa', ['npm' => $request->npm])->with('toast_error', 'Anda belum melakukan pendaftaran');
        }
        $missage = [
            'bukti_bayar.mimes' => 'File bukan jpeg,png,jpg',
            'bukti_bayar.max' => 'File lebih dari 2MB',
        ];
        $validator = Validator::make($request->all(), [
            'bukti_bayar' => 'mimes:jpeg,png,jpg|max:2048',
        ], $missage);

        if ($validator->fails()) {
            return redirect()->route('upload-bukti-pembayaran-mahasiswa', ['npm' => $request->npm])->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $file = $request->file('bukti_bayar');
        $extension = $file->getClientOriginalExtension();
        $name = $request->npm.'_'.str_replace(" ", "_", $mhs->nama_mhs).'_'.date('His').'.'.$extension;
        $tujuan_upload = 'file_bukti_pembayaran';
        $file->move($tujuan_upload,$name);
        $array_data = [
            'file_pembayaran' => $name,
            'tgl_pembayaran'  => date('Y-m-d H:i:s'),
            'created_at'       => date('Y-m-d H:i:s'),
        ];
        Mahasiswa::where('npm', $request->npm)->update($array_data);
        return redirect()->route('upload-bukti-pembayaran-mahasiswa')->with('toast_success', 'Berhasil upload bukti pembayaran');
    }

}
