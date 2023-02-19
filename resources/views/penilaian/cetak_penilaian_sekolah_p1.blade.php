@extends('template/pdf_template')
@section('conten')
    <div class="card">
        <div class="card-body">

            {{-- data mahasiswa --}}
            <table class="table table-bordered table-sm mb-4">
                <tbody>
                    <tr>
                        <th style="width: 30%">
                            NPM
                        </th>
                        <th>{{ $data_mhs->npm }}</th>
                    </tr>
                    <tr>
                        <th style="width: 18%">
                            Nama Mahasiswa
                        </th>
                        <th>{{ $data_mhs->JointoMhs->nama_mhs }}</th>
                    </tr>
                    <tr>
                        <th>
                            Program Studi
                        </th>
                        <th>{{ $list_prodi[$data_mhs->JointoMhs->program_studi] }}</th>
                    </tr>
                </tbody>
            </table>

            {{-- data n1 --}}
            <table class="table table-bordered table-sm mb-4">
                <tbody>
                    <tr>
                        <th colspan="2">
                            Penilaian Keaktifan (N1)
                        </th>
                        <th style="width: 18%" class="text-center">Nilai</th>
                    </tr>
                    @foreach ($rkap_indikators as $item_n1 => $rkap_indikator_n1)
                        @foreach ($rkap_indikator_n1->GetIdPnIndikator as $item_aspek_n1 => $aspek_n1)
                            @if ($aspek_n1->id_aspek_pn == 1)
                                <tr>
                                    <td class="text-center" style="width: 5%">{{ $item_n1 + 1 }}</td>
                                    <td>
                                        {{ $aspek_n1->nama_indikator }}
                                    </td>
                                    <td class="text-center">{{ $rkap_indikator_n1->jumlah_nilai_rkap }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    <tr>
                        <th colspan="2">
                            Total Nilai (N1)
                        </th>
                        <th class="text-center">
                            @foreach ($rkap_aspeks as $item_aspek_n1 => $rkap_aspek_n1)
                                @if ($rkap_aspek_n1->id_pn_aspek == 1)
                                    {{ $rkap_aspek_n1->jumlah_nilai }}
                                @endif
                            @endforeach
                        </th>
                    </tr>
                </tbody>
            </table>

            {{-- data n2 --}}
            <table class="table table-bordered table-sm mb-4">
                <tbody>
                    <tr>
                        <th colspan="2">
                            Laporan Pelaksanaan (N2)
                        </th>
                        <th style="width: 18%" class="text-center">Nilai</th>
                    </tr>
                    @foreach ($rkap_indikators as $item_n2 => $rkap_indikator_n2)
                        @foreach ($rkap_indikator_n2->GetIdPnIndikator as $item_aspek_n2 => $aspek_n2)
                            @if ($aspek_n2->id_aspek_pn == 2)
                                <tr>
                                    <td class="text-center" style="width: 5%">{{ $item_n2 }}</td>
                                    <td>
                                        {{ $aspek_n2->nama_indikator }}
                                    </td>
                                    <td class="text-center">
                                        {{ $rkap_indikator_n2->jumlah_nilai_rkap }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    <tr>
                        <th colspan="2">
                            Total Nilai (N2)
                        </th>
                        <th class="text-center">
                            @foreach ($rkap_aspeks as $item_aspek_n2 => $rkap_aspek_n2)
                                @if ($rkap_aspek_n2->id_pn_aspek == 2)
                                    {{ $rkap_aspek_n2->jumlah_nilai }}
                                @endif
                            @endforeach
                        </th>
                    </tr>
                </tbody>
            </table>

            {{-- data n3 --}}
            <table class="table table-bordered table-sm mb-4">
                <tbody>
                    <tr>
                        <th colspan="2">
                            Kemampuan Personal-Sosial (N3)
                        </th>
                        <th style="width: 18%" class="text-center">Nilai</th>
                    </tr>
                    @php
                        $no_n3 = 1;
                    @endphp
                    @foreach ($rkap_indikators as $item_n3 => $rkap_indikator_n3)
                        @foreach ($rkap_indikator_n3->GetIdPnIndikator as $item_aspek_n3 => $aspek_n3)
                            @if ($aspek_n3->id_aspek_pn == 3)
                                <tr>
                                    <td class="text-center" style="width: 5%">{{ $no_n3++ }}</td>
                                    <td>
                                        {{ $aspek_n3->nama_indikator }}
                                    </td>
                                    <td class="text-center">{{ $rkap_indikator_n3->jumlah_nilai_rkap }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    <tr>
                        <th colspan="2">
                            Total Nilai (N3)
                        </th>
                        <th class="text-center">
                            @foreach ($rkap_aspeks as $item_aspek_n3 => $rkap_aspek_n3)
                                @if ($rkap_aspek_n3->id_pn_aspek == 3)
                                    {{ $rkap_aspek_n3->jumlah_nilai }}
                                @endif
                            @endforeach
                        </th>
                    </tr>
                </tbody>
            </table>

            {{-- data na --}}
            <table class="table table-bordered table-sm mb-4">
                <tbody>
                    <tr>
                        <th>Nila (NA)</th>
                        <th style="width: 18%" class="text-center">Nilai</th>
                        <th style="width: 18%" class="text-center">Konfert Nilai</th>
                    </tr>
                    <tr>
                        <th>Total Nilai Akhir</th>
                        <th style="width: 18%" class="text-center">{{ $data_mhs->jumlah_na }}</th>
                        <th style="width: 18%" class="text-center">{{ $data_mhs->huruf }}</th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
