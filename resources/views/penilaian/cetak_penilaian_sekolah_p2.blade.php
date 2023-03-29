@extends('template/pdf_template')
@section('conten')
    <div class="card-body">
        <table class="table table-bordered table-sm mb-4">
            {{-- <input type="hidden" class="form-control form-control-sm" value="" name="id_pn" id="id_pn" readonly> --}}
            <tbody>
                <tr>
                    <th style="width: 30%">
                        Nama Mahasiswa
                    </th>
                    <th>{{ $penilaian->JointoMhs->nama_mhs }}</th>
                </tr>
                <tr>
                    <th>
                        NPM
                    </th>
                    <th>{{ $penilaian->JointoMhs->npm }}</th>
                </tr>
                <tr>
                    <th>
                        Program Studi
                    </th>
                    <th>{{ $prodi[$penilaian->JointoMhs->program_studi] }}</th>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm mb-4">
            <tbody>
                <tr>
                    <th colspan="2">
                        Kpribadian dan Sosial (N1)
                    </th>
                    <td class="text-center">Nilai</td>
                </tr>
                @php
                    $no_n1 = 1;
                @endphp
                @foreach ($list_indikator_n1 as $item_n1 => $indikator_n1)
                    <tr>
                        <td class="text-center" style="width: 5%">{{ $no_n1++ }}</td>
                        <td>
                            {{ $indikator_n1->nama_indikator }}
                        </td>
                        <td style="width: 8%" class="text-center">
                            {{ $indikator_n1->PnRkapIndikator->jumlah_nilai_rkap }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="2">
                        Jumlah Nilai (N1)
                    </th>
                    <th class="text-center">{{ $rkap_aspek_n1->jumlah_nilai }}</th>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm mb-4">
            <tbody>
                <tr>
                    <th colspan="2">
                        Laporan Pelaksanaan (N2)
                    </th>
                    <td class="text-center">Nilai</td>
                </tr>
                @php
                    $no_n2 = 1;
                @endphp
                @foreach ($list_indikator_n2 as $item_n2 => $indikator_n2)
                    <tr>
                        <td class="text-center" style="width: 5%">{{ $no_n2++ }}</td>
                        <td>{{ $indikator_n2->nama_indikator }}</td>
                        <td style="width: 8%" class="text-center">
                            {{ $indikator_n2->PnRkapIndikator->jumlah_nilai_rkap }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="2">
                        Jumlah Nilai (N2)
                    </th>
                    <th class="text-center">
                        {{ $rkap_aspek_n2->jumlah_nilai }}
                    </th>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm mb-4">
            <tbody>
                <tr>
                    <th colspan="2">
                        RPP (N3)
                    </th>
                    <td class="text-center">Nilai</td>
                </tr>
                @php
                    $no_n3 = 1;
                @endphp
                @foreach ($list_indikator_n3 as $item_n3 => $indikator_n3)
                    <tr>
                        <td class="text-center" style="width: 5%">{{ $no_n3++ }}</td>
                        <td>{{ $indikator_n3->nama_indikator }}</td>
                        <td style="width: 8%" class="text-center">
                            {{ $indikator_n3->PnRkapIndikator->jumlah_nilai_rkap }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="2">
                        Jumlah Nilai (N3)
                    </th>
                    <th class="text-center">
                        {{ $rkap_aspek_n3->jumlah_nilai }}
                    </th>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm mb-4">
            <tbody>
                <tr>
                    <th colspan="2">
                        Pembelajaran dan Video (N4)
                    </th>
                    <td class="text-center">Nilai</td>
                </tr>
                @php
                    $no_n4 = 1;
                @endphp
                @foreach ($list_indikator_n4 as $item_n4 => $indikator_n4)
                    <tr>
                        <td class="text-center" style="width: 5%">{{ $no_n4++ }}</td>
                        <td>{{ $indikator_n4->nama_indikator }}</td>
                        <td style="width: 8%" class="text-center">
                            {{ $indikator_n4->PnRkapIndikator->jumlah_nilai_rkap }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="2">
                        Jumlah Nilai (N4)
                    </th>
                    <th class="text-center">
                        {{ $rkap_aspek_n4->jumlah_nilai }}
                    </th>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm mb-4">
            <tbody>
                <tr>
                    <th>Nila (NA)</th>
                    <th style="width: 18%" class="text-center">Nilai</th>
                    <th style="width: 18%" class="text-center">Konfert Nilai</th>
                </tr>
                <tr>
                    <th>Total Nilai Akhir</th>
                    <th style="width: 18%" class="text-center">{{ $penilaian->jumlah_na }}</th>
                    <th style="width: 18%" class="text-center">{{ $penilaian->huruf }}</th>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
