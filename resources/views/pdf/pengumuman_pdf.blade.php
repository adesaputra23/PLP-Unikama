
@extends('template/pdf_template')
@section('conten')
    <div style="margin-top: 20px;">
        <p style="font-size: 0.8rem">Tanggal Cetak : {{ date('Y-m-d H:i:s') }}</p>
        <table class="table table-bordered table-sm" style="margin-top: -12px">
            <tr>
                <td style="width: 30%;"><b>NPM</b></td>
                <td>{{ $get_mhs->npm }}</td>
            </tr>
            <tr>
                <td><b>Nama Mahasiswa</b></td>
                <td>{{ $get_mhs->nama_mhs }}</td>
            </tr>
            <tr>
                <td><b>Program Studi</b></td>
                <td>{{ $list_prodi[$get_mhs->program_studi] }}</td>
            </tr>
            <tr>
                <td><b>Fakultas</b></td>
                <td>{{ $list_fakultas[$get_mhs->fakultas] }}</td>
            </tr>
            <tr>
                <td><b>Jenis PLP</b></td>
                <td>
                    @if ($get_mhs->jenis_plp === 1)
                        {{ 'PLP I' }}
                    @else
                        {{ 'PLP II' }}
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Penempatan Sekolah</b></td>
                <td>{{ $get_sekolah->nama_sekolah }}</td>
            </tr>
            <tr>
                <td><b>NIK/NIDN Kepala Sekolah</b></td>
                <td>{{ $get_kepsek->nik }}</td>
            </tr>
            <tr>
                <td><b>Nama Kepala Sekolah</b></td>
                <td>{{ $get_kepsek->nama_kepsek }}</td>
            </tr>
            <tr>
                <td><b>NIK/NIDN Guru Pamong</b></td>
                <td>{{ $get_guru_pamong->nik }}</td>
            </tr>
            <tr>
                <td><b>Nama Guru Pamong</b></td>
                <td>{{ $get_guru_pamong->nama_guru_pamong }}</td>
            </tr>
            <tr>
                <td><b>NIK/NIDN DPL</b></td>
                <td>{{ $get_dpl->nik }}</td>
            </tr>
            <tr>
                <td><b>Nama DPL</b></td>
                <td>{{ $get_dpl->nama_dpl }}</td>
            </tr>
            <tr>
                <td><b>Program Studi DPL</b></td>
                <td>{{ $list_prodi[$get_dpl->program_studi] }}</td>
            </tr>
            <tr>
                <td><b>Created At</b></td>
                <td>{{ $get_zonasi->created_at }}</td>
            </tr>
            <tr>
                <td><b>Tanggal Mulai PLP</b></td>
                <td>5 September 2023</td>
            </tr>
            <tr>
                <td><b>Tanggal Berakhir PLP</b></td>
                <td>30 November 2023</td>
            </tr>
        </table>
    </div>
    <br>
    <div class="float-right">
        <p style="font-size: 14px;">Menyetujui Kepala LP3L</p>
        <div style="margin-top: 20px">
            <img src="{{ storage_path('app/public/ttd-pak-joko.jpg') }}" width="150px" alt="">
        </div>
        <div style="margin-top: -30px; margin-left: 10px;">
            <p style="font-size: 14px;"><u>Hary Wijaya M.Pd</u></p>
            <p style="margin-top: -20px; font-size: 14px;">NIK : 342324234</p>
        </div>
    </div>
@endsection


