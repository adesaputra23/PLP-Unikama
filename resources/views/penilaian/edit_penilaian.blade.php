@extends('template/template_admin')
@section('conten')
    {{-- secction header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Penilaian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Penilaian</a></li>
                        <li class="breadcrumb-item">Edit Penilaian</li>
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
                <h3 class="card-title">Edit Penilaian PLP I</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="{{ route('proses.simpan.penilaian.p1') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-2">
                        <button class="btn btn-success btn-sm">Simpan</button>
                    </div>

                    <table class="table table-bordered table-sm mb-4">
                        <input type="hidden" class="form-control form-control-sm" value="{{ $data->id_penilaian }}"
                            name="id_pn" id="id_pn" readonly>
                        <tbody>
                            <tr>
                                <th style="width: 18%">
                                    Nama Mahasiswa
                                </th>
                                <th>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $data->JointoMhs->nama_mhs }}" name="nama" id="nama" readonly>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    NPM
                                </th>
                                <th>
                                    <input type="text" class="form-control form-control-sm" value="{{ $data->npm }}"
                                        name="npm" id="npm" readonly>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Program Studi
                                </th>
                                <th>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $list_prodi[$data->JointoMhs->program_studi] }}" name="prodi" id="prodi"
                                        readonly>
                                </th>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered table-sm mb-4">
                        <tbody>
                            <tr>
                                <th colspan="2">
                                    Penilaian Keaktifan (N1)
                                    <button class="btn btn-info btn-sm float-right" type="button" data-toggle="modal"
                                        data-target="#modal-kriteria-n1"
                                        style="padding: 0px 2px 0px 2px">Keriteria (N1)</button>
                                </th>
                                <td class="text-center">Nilai</td>
                            </tr>
                            @foreach ($list_pn_indikator as $item_indikator => $pn_indikator)
                                @if ($pn_indikator->id_aspek_pn == 1)
                                    <tr>
                                        <td>{{ $no_pn_1++ }}</td>
                                        <td>{{ $pn_indikator->nama_indikator }}</td>
                                        <td style="width: 15%">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary{{ $item_indikator }}" name="radio1"
                                                    data-nilai="{{ $pn_indikator->jumlah_nilai }}"
                                                    value="{{ $pn_indikator->nilai_indikator }}"
                                                    {{ $pn_indikator->id_indikator_pn == $get_id_indikator_pn ? 'checked' : '' }}>
                                                <label
                                                    for="radioPrimary{{ $item_indikator }}">{{ $pn_indikator->nilai_indikator }}
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <input type="hidden" name="id_rkap_aspek_pn_n1" id="id_rkap_aspek_pn_n1"
                                value="{{ $get_id_aspek_pn_n1 }}">
                            <input type="hidden" name="id_rkap_indikator_pn_n1" id="id_rkap_indikator_pn_n1"
                                value="{{ $get_id_rkap_aspek }}">
                            <tr>
                                <th colspan="2">
                                    Jumlah Nilai (N1)
                                </th>
                                <td>
                                    <input type="hidden" name="id_n1" id="id_n1">
                                    <input type="text" class="form-control form-control-sm" id="jml_nilai" name="jml_nilai"
                                        value="{{ $get_nilai }}" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered table-sm mb-4">
                        <tbody>
                            <tr>
                                <th colspan="2">
                                    Laporan Pelaksanaan (N2)
                                     <button class="btn btn-info btn-sm float-right" type="button" data-toggle="modal"
                                        data-target="#modal-kriteria-n2"
                                        style="padding: 0px 2px 0px 2px">Indikator (N2)</button>
                                </th>
                                <td class="text-center">Nilai</td>
                            </tr>
                            @php
                                $item_indikator = 0;
                                $no_n2 = 1;
                            @endphp
                            @foreach ($list_pn_indikator as $item_indikator_n2 => $pn_indikator_n2)
                                @if ($pn_indikator_n2->id_aspek_pn == 2)
                                    <tr>
                                        <td>{{ $no_n2++ }}</td>
                                        <td>{{ $pn_indikator_n2->nama_indikator }}</td>
                                        <td style="width: 15%">
                                            <input type="hidden" name="id_rkap_indikator_n2[]" id="id_rkap_indikator_n2"
                                                value="{{ $pn_indikator_n2->PnRkapIndikator->id_pn_rkap_indikator }}">
                                            <input type="hidden" name="id_rkap_aspek_pn_n2" id="id_rkap_aspek_pn_n2"
                                                value="{{ $get_id_aspek_pn_n2 }}">
                                            <div class="form-n2">
                                                <input max="{{ $pn_indikator_n2->jumlah_nilai }}" min="0" type="number"
                                                    name="n2[]" id="n2{{ $item_indikator++ }}"
                                                    class="form-control n2 form-control-sm"
                                                    value="{{ $pn_indikator_n2->PnRkapIndikator->jumlah_nilai_rkap }}">
                                                <small class="text-danger">*Note: Nilai
                                                    Max:{{ $pn_indikator_n2->jumlah_nilai }}</small>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <th colspan="2">
                                    Jumlah Nilai (N2)
                                </th>
                                <td>
                                    <input type="text" class="form-control form-control-sm" name="jml_nilai_n2"
                                        id="jml_nilai_n2" value="{{ $get_jumlah_nilai_pn_n2 }}" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered table-sm mb-4">
                        <tbody>
                            <tr>
                                <th colspan="2">
                                    Kemampuan Personal-Sosial (N3)
                                    <button class="btn btn-info btn-sm float-right" type="button" data-toggle="modal"
                                        data-target="#modal-kriteria-n3"
                                        style="padding: 0px 2px 0px 2px">Keriteria (N3)</button>
                                </th>
                                <td class="text-center">Nilai</td>
                            </tr>
                            @foreach ($list_pn_indikator as $item_indikator_n3 => $pn_indikator_n3)
                                @if ($pn_indikator_n3->id_aspek_pn == 3)
                                    <tr>
                                        <td>{{ $no_n3++ }}</td>
                                        <td>
                                            {{ $pn_indikator_n3->nama_indikator }}
                                        </td>
                                        <td style="width: 15%">
                                            <input type="hidden" name="id_rkap_indikator_n3[]" id="id_rkap_indikator_n3"
                                                value="{{ $pn_indikator_n3->PnRkapIndikator->id_pn_rkap_indikator }}">
                                            <input type="hidden" name="id_rkap_aspek_pn_n3" id="id_rkap_aspek_pn_n3"
                                                value="{{ $get_id_aspek_pn_n3 }}">
                                            <div class="form-n3">
                                                <input type="number" min="0" max="{{ $pn_indikator_n3->jumlah_nilai }}"
                                                    class="form-control n3 form-control-sm" name="n3[]" id="n3"
                                                    value="{{ $pn_indikator_n3->PnRkapIndikator->jumlah_nilai_rkap }}">
                                                <small class="text-danger">*Note: Nilai
                                                    Max:{{ $pn_indikator_n3->jumlah_nilai }}</small>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <th colspan="2">
                                    Jumlah Nilai (N3)
                                </th>
                                <td>
                                    <input type="number" class="form-control form-control-sm" id="jml_nilai_n3"
                                        name="jml_nilai_n3" value="{{ $get_jumlah_nilai_pn_n3 }}" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>

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
                                       Penilaian Keaktifan (N1)
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="width: 50%">Kriteria Penilaian</th>
                                    <th class="text-center">Skor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">A</td>
                                    <td class="text-center">100</td>
                                </tr>
                                <tr>
                                    <td class="text-center">A-</td>
                                    <td class="text-center">90</td>
                                </tr>
                                <tr>
                                    <td class="text-center">B+</td>
                                    <td class="text-center">83</td>
                                </tr>
                                <tr>
                                    <td class="text-center">B</td>
                                    <td class="text-center">76</td>
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

        {{-- Indikator N2 --}}
        <div class="modal fade" id="modal-kriteria-n2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Indikator Penilaian (N2)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-sm mb-4">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">
                                       Laporan Pelaksanaan (N2)
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-center">Indikator Penilaian</th>
                                    <th class="text-center">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_pn_indikator as $item_indikator_n2 => $pn_indikator_n2)
                                @if ($pn_indikator_n2->id_aspek_pn == 2)
                                    <tr>
                                        <td>{{ $pn_indikator_n2->nama_indikator }}</td>
                                        <td class="text-center" style="width: 30%">
                                            {{ '1 - '.$pn_indikator_n2->jumlah_nilai}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
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

        {{-- keriteria N3 --}}
        <div class="modal fade" id="modal-kriteria-n3">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Kriteria Penilaian (N3)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-sm mb-4">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">
                                        Kemampuan Personal-Sosial (N3)
                                    </th>
                                </tr>
                                <tr>
                                    <th>Kriteria Penilaian</th>
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
    {{-- end section conten --}}

    <script>
        $('.form-n2').on('input', '.n2', function() {
            var totalSum = 0;
            $('.form-n2 .n2').each(function() {
                var totalVal = $(this).val();
                if ($.isNumeric(totalVal)) {
                    totalSum += parseFloat(totalVal);
                }
            });
            $('#jml_nilai_n2').val(totalSum);
        });

        $('.form-n3').on('input', '.n3', function() {
            var totalSum = 0;
            $('.form-n3 .n3').each(function() {
                var totalVal = $(this).val();
                if ($.isNumeric(totalVal)) {
                    totalSum += parseInt(totalVal) / parseInt(48);
                }
            });
            var total = totalSum * 100;
            var desimal = total.toFixed(0)
            $('#jml_nilai_n3').val(desimal);
        });

        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "{{ url('ajax/get-indikator-keaktifan') }}",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    var data_n1 = response.list_pn_indikator_n1;
                    var data_n2 = response.list_pn_indikator_n2;
                    $.each(data_n1, function(index, value) {
                        $(document).on('change', '#radioPrimary' + index, function() {
                            if ($(this).is(':checked') === true) {
                                var nilai = $(this).data('nilai')
                                $('#jml_nilai').val(nilai);
                            };
                            // console.log();
                            $('#id_n1').val(value.id_indikator_pn);
                        });
                    });
                }
            });
        })
    </script>

@endsection
