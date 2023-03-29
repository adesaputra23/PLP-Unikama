@extends('template/template_admin')
@section('conten')
    {{-- secction header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nilai {{($user->jenis_plp == 1) ? 'PLP I' : 'PLP II'}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Nilai {{($user->jenis_plp == 1) ? 'PLP I' : 'PLP II'}}</li>
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
                <h3 class="card-title">Nilai {{($user->jenis_plp == 1) ? 'PLP I' : 'PLP II'}}</h3>

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
                                <p>Dalam proses kelengkapan data PLP</p>
                            @else
                                @if ($user->jenis_plp == 1)
                                    <h4><b>Nilai Sekolah</b></h4>
                                    <table id="tabel1" class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nama Sekolah</th>
                                                <th class="text-center">NIK / Nama Kpala Sekolah</th>
                                                <th class="text-center">Nilai Akhir (NA)</th>
                                                <th class="text-center">Konvert (NA)</th>
                                                <th class="text-center">Created At</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilai_sekolah as $item => $value)
                                                <tr>
                                                    <td>{{$value->JointoMitraSekolah->nama_sekolah}}</td>
                                                    <td>{{$value->JointoMitraSekolah->JointoKepsek->nik}} - {{ $value->JointoMitraSekolah->JointoKepsek->nama_kepsek }}</td>
                                                    <td>
                                                        @if (empty($value->JointoPenilaian))
                                                        {{ '-' }}
                                                        @else
                                                            @if ($value->JointoPenilaian->jumlah_na == null)
                                                                {{ '-' }}
                                                            @else
                                                                {{ $value->JointoPenilaian->jumlah_na }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (empty($value->JointoPenilaian))
                                                            {{ '-' }}
                                                        @else
                                                            @if ($value->JointoPenilaian->huruf == null)
                                                                {{ '-' }}
                                                            @else
                                                                {{ $value->JointoPenilaian->huruf }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (empty($value->JointoPenilaian))
                                                            {{ '-' }}
                                                        @else
                                                            @if ($value->JointoPenilaian->huruf == null)
                                                                {{ '-' }}
                                                            @else
                                                                {{ $value->JointoPenilaian->created_at }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td style="width: 8%">
                                                        @if (empty($value->JointoPenilaian))
                                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                                data-target="#not-detail">Detail</button>
                                                        @else
                                                            @if ($value->JointoPenilaian->huruf == null)
                                                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                                                    data-target="#not-detail">Detail</button>
                                                            @else
                                                                <a href="{{ route('detail.penilaian.p1', ['id' => $value->JointoPenilaian->id_penilaian]) }}"
                                                                    class="btn btn-info btn-sm">Detail</a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <h4><b>Nilai Akhir</b></h4>
                                    <table id="tabel1" class="table table-bordered table-striped table-sm">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Nilai PLP I</th>
                                                <th>Grade</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilai_akhir_mhs_plp_1 as $item_plp_1 => $mhs_plp_1)
                                                <tr>
                                                    <th class="text-center">
                                                        @if (empty($mhs_plp_1->JointoPenilaian))
                                                            {{ '-' }}
                                                        @else
                                                            @if ($mhs_plp_1->JointoPenilaian->jumlah_na == null)
                                                                {{ '-' }}
                                                            @else
                                                                {{ $mhs_plp_1->JointoPenilaian->jumlah_na }}
                                                            @endif
                                                        @endif
                                                    </th>
                                                    <th class="text-center">
                                                        @if (empty($mhs_plp_1->JointoPenilaian))
                                                            {{ '-' }}
                                                        @else
                                                            @if ($mhs_plp_1->JointoPenilaian->huruf == null)
                                                                {{ '-' }}
                                                            @else
                                                                {{ $mhs_plp_1->JointoPenilaian->huruf }}
                                                            @endif
                                                        @endif
                                                    </th>
                                                    <td class="text-center">
                                                        @if (empty($mhs_plp_1->JointoPenilaian))
                                                            {{ 'Tidak Lulus' }}
                                                        @else
                                                            @if ($mhs_plp_1->JointoPenilaian->huruf == null)
                                                                {{ 'Tidak Lulus' }}
                                                            @else
                                                                @if ($mhs_plp_1->JointoPenilaian->huruf = 'A' || $mhs_plp_1->JointoPenilaian->huruf = 'A-' || $mhs_plp_1->JointoPenilaian->huruf = 'B+' || $mhs_plp_1->JointoPenilaian->huruf = 'B' || $mhs_plp_1->JointoPenilaian->huruf = 'B-' || $mhs_plp_1->JointoPenilaian->huruf = 'C+' || $mhs_plp_1->JointoPenilaian->huruf = 'C' || $mhs_plp_1->JointoPenilaian->huruf = 'C-')
                                                                    {{'Lulus'}}
                                                                @else
                                                                    {{'Tidak Lulus'}}
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h4><b>Nilai DPL</b></h4>
                                    <table id="tabel1" class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NIK / Nama DPL</th>
                                                <th class="text-center">Prodi DPL</th>
                                                <th class="text-center">Nilai Akhir (NA)</th>
                                                <th class="text-center">Konvert (NA)</th>
                                                <th class="text-center">Created At</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilai_dpl as $key => $val)
                                                <tr>
                                                    <td>
                                                        ({{ $val->JointoDpl->nik }}) -
                                                        {{ $val->JointoDpl->nama_dpl }}
                                                    </td>
                                                    <td>
                                                        {{ $list_prodi[$val->JointoDpl->program_studi] }}
                                                    </td>
                                                    <td>
                                                        @if ($val->JointoPenilaianDpl->jumlah_na == null)
                                                            {{ '-' }}
                                                        @else
                                                            {{ $val->JointoPenilaianDpl->jumlah_na }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($val->JointoPenilaianDpl->huruf == null)
                                                            {{ '-' }}
                                                        @else
                                                            {{ $val->JointoPenilaianDpl->huruf }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (empty($val->JointoPenilaianDpl->huruf))
                                                            {{ '-' }}
                                                        @else
                                                            {{ $val->JointoPenilaianDpl->created_at }}
                                                        @endif
                                                    </td>
                                                    <td style="width: 8%">
                                                        @if (empty($val->JointoPenilaianDpl->huruf))
                                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                                data-target="#not-detail">Detail</button>
                                                        @else
                                                            <a href="{{ route('detail.nilai.dpl.p2', ['id' => $val->id_zonasi]) }}"
                                                                class="btn btn-info btn-sm">Detail</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <h4><b>Nilai Sekolah</b></h4>
                                    <table id="tabel1" class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nama Sekolah</th>
                                                <th class="text-center">NIK / Nama Kpala Sekolah</th>
                                                <th class="text-center">Nilai Akhir (NA)</th>
                                                <th class="text-center">Konvert (NA)</th>
                                                <th class="text-center">Created At</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilai_sekolah as $item => $value)
                                                <tr>
                                                    <td>{{$value->JointoMitraSekolah->nama_sekolah}}</td>
                                                    <td>{{$value->JointoMitraSekolah->JointoKepsek->nik}} - {{ $value->JointoMitraSekolah->JointoKepsek->nama_kepsek }}</td>
                                                    <td>
                                                        @if (empty($value->JointoPenilaian))
                                                        {{ '-' }}
                                                        @else
                                                            @if ($value->JointoPenilaian->jumlah_na == null)
                                                                {{ '-' }}
                                                            @else
                                                                {{ $value->JointoPenilaian->jumlah_na }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (empty($value->JointoPenilaian))
                                                            {{ '-' }}
                                                        @else
                                                            @if ($value->JointoPenilaian->huruf == null)
                                                                {{ '-' }}
                                                            @else
                                                                {{ $value->JointoPenilaian->huruf }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (empty($value->JointoPenilaian))
                                                            {{ '-' }}
                                                        @else
                                                            @if ($value->JointoPenilaian->huruf == null)
                                                                {{ '-' }}
                                                            @else
                                                                {{ $value->JointoPenilaian->created_at }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td style="width: 8%">
                                                        @if (empty($value->JointoPenilaian))
                                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                                data-target="#not-detail">Detail</button>
                                                        @else
                                                            @if ($value->JointoPenilaian->huruf == null)
                                                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                                                    data-target="#not-detail">Detail</button>
                                                            @else
                                                                <a href="{{ route('detail.penilaian.p1', ['id' => $value->JointoPenilaian->id_penilaian]) }}"
                                                                    class="btn btn-info btn-sm">Detail</a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <h4><b>Nilai Akhir</b></h4>
                                    <table id="tabel2" class="table table-bordered table-striped table-sm">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Nilai GP</th>
                                                <th>Nilai Kepsek</th>
                                                <th>Nilai DPL</th>
                                                <th>Nilai Akhir</th>
                                                <th>Grade</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilai_akhir_mhs_plp_2 as $item_plp_2 => $mhs_plp_2)
                                                <tr>
                                                    <th class="text-center">
                                                        @if (empty($mhs_plp_2->JointoPenilaian))
                                                            {{ '-' }}
                                                            @php
                                                                $gp = 0;
                                                            @endphp
                                                        @else
                                                            @if ($mhs_plp_2->JointoPenilaian->jumlah_na == null)
                                                                {{ '-' }}
                                                                @php
                                                                    $gp = 0;
                                                                @endphp
                                                            @else
                                                                {{ $mhs_plp_2->JointoPenilaian->jumlah_na }}
                                                                @php
                                                                    $gp = $mhs_plp_2->JointoPenilaian->jumlah_na;
                                                                @endphp
                                                            @endif
                                                        @endif
                                                    </th>
                                                    <th class="text-center">
                                                        @if (empty($mhs_plp_2->JointoPenilaian))
                                                            {{ '-' }}
                                                            @php
                                                                $kpsk = 0;
                                                            @endphp
                                                        @else
                                                            @if ($mhs_plp_2->JointoPenilaian->nilai_kepsek == null)
                                                                {{ '-' }}
                                                                @php
                                                                    $kpsk = 0;
                                                                @endphp
                                                            @else
                                                                {{ $mhs_plp_2->JointoPenilaian->nilai_kepsek }}
                                                                @php
                                                                    $kpsk = $mhs_plp_2->JointoPenilaian->nilai_kepsek;
                                                                @endphp
                                                            @endif
                                                        @endif
                                                    </th>
                                                    <th class="text-center">
                                                        @if (empty($mhs_plp_2->JointoPenilaianDpl))
                                                            {{ '-' }}
                                                            @php
                                                                $dpl = 0;
                                                            @endphp
                                                        @else
                                                            @if ($mhs_plp_2->JointoPenilaianDpl->jumlah_na == null)
                                                                {{ '-' }}
                                                                @php
                                                                    $dpl = 0;
                                                                @endphp
                                                            @else
                                                                {{ $mhs_plp_2->JointoPenilaianDpl->jumlah_na }}
                                                                @php
                                                                    $dpl = $mhs_plp_2->JointoPenilaianDpl->jumlah_na;
                                                                @endphp
                                                            @endif
                                                        @endif
                                                    </th>
                                                    <th class="text-center">
                                                        @php
                                                            $nilai_total = ($gp + ($kpsk * 3) + $dpl)/5;
                                                        @endphp
                                                        @if ($nilai_total == 0)
                                                            {{'-'}}
                                                        @else
                                                            {{$nilai_total}}   
                                                        @endif
                                                    </th>
                                                    <th class="text-center">
                                                        @php
                                                            // Konfert Nilai
                                                                if ($nilai_total >= 91 ) {
                                                                    // 91-100 A
                                                                    $konfert_na = 'A';
                                                                }elseif($nilai_total >= 84 ){
                                                                    // 84-90 A-
                                                                    $konfert_na = 'A-';
                                                                }elseif($nilai_total >= 75 ){
                                                                    // 75-83 B+
                                                                    $konfert_na = 'B+';
                                                                }elseif($nilai_total >= 71 ){
                                                                    // 71-76 B
                                                                    $konfert_na = 'B';
                                                                }elseif($nilai_total >= 66 ){
                                                                    // 66-70 B-
                                                                    $konfert_na = 'B-';
                                                                }elseif($nilai_total >= 61 ){
                                                                    // 61-65 C+
                                                                    $konfert_na = 'C+';
                                                                }elseif($nilai_total >= 55 ){
                                                                    // 55-60 C
                                                                    $konfert_na = 'C';
                                                                }elseif($nilai_total >= 41 ){
                                                                    // 41-54 D
                                                                    $konfert_na = 'D';
                                                                }elseif($nilai_total <= 40 ){
                                                                    // 0-40 E
                                                                    $konfert_na = 'E';
                                                                }
                                                        @endphp
                                                        {{$konfert_na}}
                                                    </th>
                                                    <td class="text-center">
                                                        @if ($konfert_na == 'A' || $konfert_na == 'A-' || $konfert_na == 'B+' || $konfert_na == 'B' || $konfert_na == 'B-' || $konfert_na == 'C+' || $konfert_na == 'C' || $konfert_na == 'C-')
                                                            {{'Lulus'}}
                                                        @else
                                                            {{'Tidak Lulus'}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
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

    {{-- Modal --}}
    <div class="modal fade" id="not-detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data Penilaian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Penilaian belum di seting.</p>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection
