@extends('template/pdf_template')
@section('conten')
    <table class="table table-bordered table-striped table-sm">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Prodi</th>
                <th>Nilai PLP I</th>
                <th>Grade</th>
                <th>Status</th>
                {{-- <th>Aaction</th> --}}
            </tr>
        </thead>
        <tbody>
            @php
                $no_plp_1 = 1;
            @endphp
            @foreach ($list_mhs_plp_1 as $item_plp_1 => $mhs_plp_1)
                <tr>
                    <td class="text-center">{{ $no_plp_1++ }}</td>
                    <td>{{ $mhs_plp_1->JointoMhs->npm }}</td>
                    <td>{{ $mhs_plp_1->JointoMhs->nama_mhs }}</td>
                    <td>{{ $list_prodi[$mhs_plp_1->JointoMhs->program_studi] }}</td>
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
                    {{-- <td>
                        @if (empty($mhs_plp_1->JointoPenilaian))
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
