@php
    use App\User;
    $list_plp = [
        1 => 'PLP I',
        2 => 'PLP II',
    ];
    $list_kelas = [
        1 => 'Reguler',
        2 => 'Karyawan',
    ];
    $list_jenis_kelamin = [
        1 => 'Laki-Laki',
        2 => 'Perempuan'
    ];
@endphp
@extends('template/pdf_template')
@section('conten')
    <div class="alert alert-success" role="alert">
        @if ($status == 0)
            Pendaftaran {{$list_plp[$mhs->jenis_plp]}} berhasil.
            <p>Alur Pembayaran:</p>
            <ul style="margin-top: -15px;">
                <li>Melakukan pembayaran ke Bank yang telah ditentukan.</li>
                <li>Upload bukti pembayaran melalui sistem di menu upload bukti pembayaran.</li>
            </ul>
        @else
            Anda sudah terdaftar di {{$list_plp[$mhs->jenis_plp]}}.
        @endif
    </div>
    <table class="table table-bordered table-striped table-hover">
        <tbody>
            <tr>
                <th scope="row" style="width: 30%;">NPM</th>
                <td>{{$mhs->npm}}</td>
            </tr>
            <tr>
                <th scope="row">Nama Mahasiswa</th>
                <td>{{$mhs->nama_mhs}}</td>
            </tr>
            <tr>
                <th scope="row">Program Studi</th>
                <td>{{User::MAP_PRODI[$mhs->program_studi]}}</td>
            </tr>
            <tr>
                <th scope="row">Fakultas</th>
                <td>{{User::MAP_FAKULTAS[$mhs->fakultas]}}</td>
            </tr>
            <tr>
                <th scope="row">Angkatan</th>
                <td>{{$mhs->angkatan}}</td>
            </tr>
            <tr>
                <th scope="row">Kelas</th>
                <td>{{ $list_kelas[$mhs->kelas]}}</td>
            </tr>
            <tr>
                <th scope="row">Agama</th>
                <td>{{$mhs->agama}}</td>
            </tr>
            <tr>
                <th scope="row">Jenis Kelamin</th>
                <td>{{$list_jenis_kelamin[$mhs->jenis_kelamin]}}</td>
            </tr>
            <tr>
                <th scope="row">PLP</th>
                <td>{{$list_plp[$mhs->jenis_plp]}}</td>
            </tr>
            <tr>
                <th scope="row">No Hp</th>
                <td>{{$mhs->no_hp}}</td>
            </tr>
            <tr>
                <th scope="row">Tanggal Pendaftaran</th>
                <td>{{$mhs->tgl_pendaftaran}}</td>
            </tr>
        </tbody>
    </table>
@endsection
