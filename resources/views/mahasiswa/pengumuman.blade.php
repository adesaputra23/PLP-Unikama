@extends('template/template_admin')
@section('conten')
    {{-- secction header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengumuman Penempatan Sekolah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Pengumuman Penempatan Sekolah</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    {{-- end section header --}}

    {{-- section conten --}}
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pengumuman Penempatan Sekolah</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

            </div>

            <div class="card-body">
                <div class="tab-custom-content"></div>
                <div class="mt-2">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1-tab">
                        <div class="table-responsive">
                            @if (!$user->JointoZonasi)
                                <div>
                                    <p>Harap pilih sekolah terlebih dahulu!</p>
                                </div>
                            @else
                                @if ($user->JointoZonasi->id_guru_pamong == null || $user->JointoZonasi->id_dpl == null)
                                    <div>
                                        <p>Data anda masih di proses!</p>
                                    </div>
                                @else
                                    <div class="mb-2">
                                        <a href="{{route('PengumumanPdf', $user->JointoZonasi->id_zonasi)}}" class="btn btn-sm btn-primary" target="_blank">Cetak PDF</a>
                                    </div>
                                    <table class="table table-striped table-sm">
                                        <tbody>
                                            <tr>
                                                <th style="width: 240px">NPM</th>
                                                <td>{{$user->npm}}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Mahasiswa</th>
                                                <td>{{$user->nama_mhs}}</td>
                                            </tr>
                                            <tr>
                                                <th>Program Studi</th>
                                                <td>{{$prodi[$user->program_studi]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Fakultas</th>
                                                <td>{{$fakultas[$user->fakultas]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Penempatan Sekolah</th>
                                                <td>{{$user->JointoZonasi->JointoMitraSekolah->nama_sekolah}}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Kepala Sekolah</th>
                                                <td>{{$user->JointoZonasi->JointoMitraSekolah->JointoKepsek->nama_kepsek}}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Guru Pamong</th>
                                                <td>{{$user->JointoZonasi->JointoGuruPamong->nama_guru_pamong}}}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama DPL</th>
                                                <td>{{$user->JointoZonasi->JointoDpl->nama_dpl}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Daftar</th>
                                                <td>{{$user->tgl_pendaftaran}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Zonasi</th>
                                                <td>{{$user->JointoZonasi->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Varifikasi</th>
                                                <td>{{$user->tgl_verifikasi}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Mulai PLP</th>
                                                <td>5 September 2023</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Berakhir PLP</th>
                                                <td>30 November 2023</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    {{-- end section conten --}}

@endsection
