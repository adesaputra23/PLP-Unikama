@extends('template/template_admin')
@section('conten')
    {{-- secction header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Penilaian DPL</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Edit Penilaian DPL</li>
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
                <h3 class="card-title">Edit Penilaian DPL</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

            </div>
            <form action="{{ route('proses.edit.nilai.dpl.p2', ['id' => $data_mhs->id_zonasi]) }}" method="POST">
                @csrf
                <div class="card-body">

                    <div class="mb-2">
                        <button type="submit" class="btn btn-success btn-sm">
                            Simpan
                        </button>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mb-4">
                            <tbody>
                                <tr>
                                    <th style="width: 14%">NPM</th>
                                    <th>
                                        <input type="text" class="form-control form-control-sm" name="npm"
                                            value="{{ $data_mhs->JointoMhs->npm }}" readonly>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="width: 24%">Nama Mahasiswa</th>
                                    <th>
                                        <input type="text" class="form-control form-control-sm"
                                            value="{{ $data_mhs->JointoMhs->nama_mhs }}" readonly>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="width: 24%">Program Studi</th>
                                    <th>
                                        <input type="text" class="form-control form-control-sm"
                                            value="{{ $list_prodi[$data_mhs->JointoMhs->program_studi] }}" readonly>
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered table-sm mb-4">
                            <tbody>
                                <tr>
                                    <th colspan="2">
                                        Penilaian RPP (N1)
                                        <button class="btn btn-info btn-sm float-right" type="button" data-toggle="modal"
                                        data-target="#modal-kriteria-n1" style="padding: 0px 2px 0px 2px">Keriteria (N1)</button>
                                    </th>
                                    <th style="width: 18%" class="text-center">Nilai</th>
                                </tr>
                                @php
                                    $no_n1 = 1;
                                @endphp
                                @foreach ($list_indikator_dpl_n1 as $item_n1 => $indikator_dpl_n1)
                                    
                                    <tr>
                                        <td>{{ $no_n1++ }}</td>
                                        <td>
                                            {{ $indikator_dpl_n1->GetPnIndikatorDPl->nama_indikator_dpl }}
                                            {{-- {{ $indikator_dpl_n1 }} --}}
                                        </td>
                                        <td>
                                            <div class="form-n1">
                                                <input type="hidden" class="form-control form-control-sm"
                                                    name="id_rkap_indikator_dpl_n1[]" id="id_rkap_indikator_dpl_n1"
                                                    value="{{ $indikator_dpl_n1->id_pn_indikator_dpl }}">
                                                <input type="number" max="{{ $indikator_dpl_n1->jumlah_nilai }}"
                                                    value="{{ $indikator_dpl_n1->jumlah_nilai_rkap }}"
                                                    min="{{ 0 }}" class="form-control n1 form-control-sm"
                                                    name="indikator_dpl_n1[]" id="indikator_dpl_n1">
                                                <span><small class="text-danger">Node*:nilai
                                                        max:{{ $indikator_dpl_n1->GetPnIndikatorDPl->jumlah_nilai }}</small></span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="2">Jumlah Nilai (N1)</th>
                                    <th>
                                        <input type="hidden" name="id_rkap_aspek_dpl_n1" id="id_rkap_aspek_dpl_n1"
                                            value="{{ $rkap_aspek_dpl_n1->id_rkap_aspek_dpl }}">
                                        <input type="text" class="form-control form-control-sm"
                                            name="jml_nilai_indikator_dpl_n1" id="jml_nilai_indikator_dpl_n1"
                                            value="{{ $rkap_aspek_dpl_n1->jumlah_nilai }}" readonly>
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered table-sm mb-4">
                            <tbody>
                                <tr>
                                    <th colspan="2">
                                        Penilaian Video (N2)
                                        <button class="btn btn-info btn-sm float-right" type="button" data-toggle="modal"
                                        data-target="#modal-kriteria-n2" style="padding: 0px 2px 0px 2px">Keriteria (N2)</button>
                                    </th>
                                    <th style="width: 18%" class="text-center">Nilai</th>
                                </tr>
                                @php
                                    $no_n2 = 1;
                                @endphp
                                @foreach ($list_indikator_dpl_n2 as $item_n2 => $indikator_dpl_n2)
                                    <tr>
                                        <td>{{ $no_n2++ }}</td>
                                        <td>{{ $indikator_dpl_n2->GetPnIndikatorDPl->nama_indikator_dpl }}</td>
                                        <td>
                                            <div class="form-n2">
                                                <input type="hidden" class="form-control form-control-sm"
                                                    name="id_rkap_indikator_dpl_n2[]" id="id_rkap_indikator_dpl_n2"
                                                    value="{{ $indikator_dpl_n2->id_pn_indikator_dpl }}">
                                                <input type="number" max="{{ $indikator_dpl_n2->jumlah_nilai }}"
                                                    min="{{ 0 }}" class="form-control n2 form-control-sm"
                                                    name="indikator_dpl_n2[]" id="indikator_dpl_n2"
                                                    value="{{ $indikator_dpl_n2->jumlah_nilai_rkap }}">
                                                <span><small class="text-danger">Node*:nilai
                                                        max:{{ $indikator_dpl_n2->GetPnIndikatorDPl->jumlah_nilai }}</small></span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="2">Jumlah Nilai (N2)</th>
                                    <th>
                                        <input type="hidden" name="id_rkap_aspek_dpl_n2" id="id_rkap_aspek_dpl_n2"
                                            value="{{ $rkap_aspek_dpl_n2->id_rkap_aspek_dpl }}">
                                        <input type="text" class="form-control form-control-sm"
                                            name="jml_nilai_indikator_dpl_n2" id="jml_nilai_indikator_dpl_n2"
                                            value="{{ $rkap_aspek_dpl_n2->jumlah_nilai }}" readonly>
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered table-sm mb-4">
                            <tbody>
                                <tr>
                                    <th colspan="2">Link Laporan dan Video (N3)</th>
                                    <th style="width: 45%" class="text-center">Link Pengupmpulan</th>
                                </tr>
                                @php
                                    $no_n3 = 1;
                                @endphp
                                @foreach ($list_indikator_dpl_n3 as $item_n3 => $indikator_dpl_n3)
                                    <tr>
                                        <td>{{ $no_n3++ }}</td>
                                        <td>{{ $indikator_dpl_n3->GetPnIndikatorDPl->nama_indikator_dpl }}</td>
                                        <td>
                                            <input type="hidden" class="form-control form-control-sm"
                                                name="id_rkap_indikator_dpl_n3[]" id="id_rkap_indikator_dpl_n3"
                                                value="{{ $indikator_dpl_n3->id_pn_indikator_dpl }}">
                                            <input type="text" class="form-control form-control-sm"
                                                name="indikator_dpl_n3[]" id="indikator_dpl_n3"
                                                value="{{ $indikator_dpl_n3->link_laporan }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </form>
        </div>

        {{-- Kriteria N1 --}}
        <div class="modal fade" id="modal-kriteria-n1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Kriteria Penilaian (N1)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-sm mb-4">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">
                                       Penilaian RPP (N1)
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="width: 50%">Kriteria Penilaian</th>
                                    <th class="text-center">Skor</th>
                                </tr>
                            </thead>
                             <tbody>
                                <tr>
                                    <td>Sangat Kurang</td>
                                    <td class="text-center">1</td>
                                </tr>
                                <tr>
                                    <td>Kurang</td>
                                    <td class="text-center">2</td>
                                </tr>
                                <tr>
                                    <td>Baik</td>
                                    <td class="text-center">3</td>
                                </tr>
                                <tr>
                                    <td>Sangat Baik</td>
                                    <td class="text-center">4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                        <button type="button" class="btn btn-info" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        {{-- Kriteria N2 --}}
        <div class="modal fade" id="modal-kriteria-n2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Kriteria Penilaian (N2)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-sm mb-4">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">
                                       Penilaian Video (N2)
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="width: 50%">Kriteria Penilaian</th>
                                    <th class="text-center">Skor</th>
                                </tr>
                            </thead>
                             <tbody>
                                <tr>
                                    <td>Sangat Kurang</td>
                                    <td class="text-center">1</td>
                                </tr>
                                <tr>
                                    <td>Kurang</td>
                                    <td class="text-center">2</td>
                                </tr>
                                <tr>
                                    <td>Baik</td>
                                    <td class="text-center">3</td>
                                </tr>
                                <tr>
                                    <td>Sangat Baik</td>
                                    <td class="text-center">4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                        <button type="button" class="btn btn-info" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </section>
    <script>
        $('.form-n1').on('input', '.n1', function() {
            var totalSum = 0;
            $('.form-n1 .n1').each(function() {
                var totalVal = $(this).val();
                if ($.isNumeric(totalVal)) {
                    totalSum += parseFloat(totalVal) / 60 * 100;
                }
            });
            var desimal = totalSum.toFixed(0)
            $('#jml_nilai_indikator_dpl_n1').val(desimal);
        });

        $('.form-n2').on('input', '.n2', function() {
            var totalSum = 0;
            $('.form-n2 .n2').each(function() {
                var totalVal = $(this).val();
                if ($.isNumeric(totalVal)) {
                    totalSum += parseFloat(totalVal) / 120 * 100;
                }
            });
            var desimal = totalSum.toFixed(0)
            $('#jml_nilai_indikator_dpl_n2').val(desimal);
        });
    </script>

@endsection
