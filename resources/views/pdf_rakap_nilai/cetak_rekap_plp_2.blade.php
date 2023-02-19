@extends('template/pdf_template')
@section('conten')
    <table class="table table-bordered table-striped table-sm">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Prodi</th>
                <th>Nilai GP</th>
                <th>Nilai Kepsek</th>
                <th>Nilai DPL</th>
                <th>Nilai Akhir</th>
                <th>Grade</th>
                <th>Status</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @php
                $no_plp_2 = 1;
            @endphp
            @foreach ($list_mhs_plp_2 as $item_plp_2 => $mhs_plp_2)
                <tr>
                    <td class="text-center">{{ $no_plp_2++ }}</td>
                    <td>{{ $mhs_plp_2->JointoMhs->npm }}</td>
                    <td>{{ $mhs_plp_2->JointoMhs->nama_mhs }}</td>
                    <td>{{ $list_prodi[$mhs_plp_2->JointoMhs->program_studi] }}</td>
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
                        @if ($gp == 0 && $kpsk == 0 && $dpl == 0)
                            {{'-'}}
                        @else
                            {{-- rumus = $mhs_plp_2->JointoPenilaianDpl->jumlah_na =(F390+(3*E390)+G390)/5 --}}
                            @php
                                $nilai_total = ($gp + ($kpsk * 3) + $dpl)/5;
                            @endphp
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
                    {{-- <td>
                        @if (empty($mhs_plp_1->JointoPenilaian) && empty($mhs_plp_1->JointoPenilaianDpl))
                            <a href="" class="btn btn-info btn-sm">PDF</a>
                        @else
                            <a href="" class="btn btn-info btn-sm">PDF</a>
                        @endif
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
