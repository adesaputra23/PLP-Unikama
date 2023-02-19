@extends('template/pdf_template')
@section('conten')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm mb-4">
                <tbody>
                    <tr>
                        <th style="width: 30%">NPM</th>
                        <th>
                            {{ $data_mhs->JointoMhs->npm }}
                        </th>
                    </tr>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>
                            {{ $data_mhs->JointoMhs->nama_mhs }}
                        </th>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <th>
                            {{ $list_prodi[$data_mhs->JointoMhs->program_studi] }}
                        </th>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-sm mb-4">
                <tbody>
                    <tr>
                        <th colspan="2">Penilaian RPP (N1)</th>
                        <th style="width: 12%" class="text-center">Nilai</th>
                    </tr>
                    @php
                        $no_n1 = 1;
                    @endphp
                    @foreach ($list_indikator_dpl_n1 as $item_n1 => $indikator_dpl_n1)
                        <tr>
                            <td class="text-center" style="width: 5%">{{ $no_n1++ }}</td>
                            <td>
                                {{ $indikator_dpl_n1->GetPnIndikatorDPl->nama_indikator_dpl }}
                            </td>
                            <th class="text-center">
                                {{ $indikator_dpl_n1->jumlah_nilai_rkap }}
                            </th>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="2">Jumlah Nilai (N1)</th>
                        <th class="text-center">
                            {{ $rkap_aspek_dpl_n1->jumlah_nilai }}
                        </th>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-sm mb-4">
                <tbody>
                    <tr>
                        <th colspan="2">Penilaian Video (N2)</th>
                        <th style="width: 12%" class="text-center">Nilai</th>
                    </tr>
                    @php
                        $no_n2 = 1;
                    @endphp
                    @foreach ($list_indikator_dpl_n2 as $item_n2 => $indikator_dpl_n2)
                        <tr>
                            <td class="text-center" style="width: 5%">{{ $no_n2++ }}</td>
                            <td>{{ $indikator_dpl_n2->GetPnIndikatorDPl->nama_indikator_dpl }}</td>
                            <th class="text-center">
                                {{ $indikator_dpl_n2->jumlah_nilai_rkap }}
                            </th>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="2">Jumlah Nilai (N2)</th>
                        <th class="text-center">
                            {{ $rkap_aspek_dpl_n2->jumlah_nilai }}
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
                            <td class="text-center" style="width: 5%">{{ $no_n3++ }}</td>
                            <td>{{ $indikator_dpl_n3->GetPnIndikatorDPl->nama_indikator_dpl }}</td>
                            <td>
                                {{ $indikator_dpl_n3->link_laporan }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table table-bordered table-sm mb-4">
                <tbody>
                    <tr>
                        <th colspan="2">Nilai Akhir (NA)</th>
                        <th style="width: 12%" class="text-center">Nilai</th>
                        <th style="width: 20%" class="text-center">Konfert Nilai</th>
                    </tr>
                    <tr>
                        <th colspan="2">Total Nilai Akhir</th>
                        <th style="width: 12%" class="text-center">
                            {{ $data_mhs->JointoPenilaianDPl->jumlah_na }}
                        </th>
                        <th style="width: 20%" class="text-center">
                            {{ $data_mhs->JointoPenilaianDPl->huruf }}
                        </th>
                    </tr>
                </tbody>
            </table>


        </div>

    </div>
@endsection
