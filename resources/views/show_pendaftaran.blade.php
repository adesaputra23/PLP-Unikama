@php
    use App\User;
@endphp

@extends('template.template_conten')
@section('conten')
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">PLP-UNIKAMA</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container mt-4">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 mt-4" style="margin-top: 50%;">
                Pendaftaran PLP</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="card">
                <div class="card-body">
                    @php
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
                    @if (in_array($status, [0,1]))
                        <div class="mb-2">
                            <a href="{{route('pdf', ['id' => $mhs->id_mhs, 'status' => $status])}}" class="btn btn-primary">Cetak PDF</a>
                        </div>
                        <div class="alert alert-primary" role="alert">
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

                        <table class="table table-bordered table-striped table-hover" style="width:70%; margin-left: auto; margin-right: auto;">
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
                    @endif
                </div>
            </div>
        </div>
    </section>

    @include('sweetalert::alert')
@endsection
