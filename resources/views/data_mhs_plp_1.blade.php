<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1-tab">
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Fakultas</th>
                    <th>Kelas</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal Bayar</th>
                    <th>Tanggal Verifikasi</th>
                    <th style="width: 8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_mhs_plp_1 as $item => $mhs_plp_1)
                    {{-- {{dd($mhs_plp_1)}} --}}
                    <tr>
                        <td class="text-center">{{$item + 1}}</td>
                        <td>{{ $mhs_plp_1->npm }}</td>
                        <td>{{ $mhs_plp_1->nama_mhs }}</td>
                        <td>
                            {{ $list_prodi[$mhs_plp_1->program_studi] }}
                        </td>
                        <td>
                            {{ $list_fakultas[$mhs_plp_1->fakultas] }}
                        </td>
                        <td>
                            {{ $list_kelas[$mhs_plp_1->kelas] }}
                        </td>
                        <td>
                            <div class="text-center">
                                @if ($mhs_plp_1->tgl_pendaftaran != null)
                                    {{$mhs_plp_1->tgl_pendaftaran}}
                                @else
                                    {{'-'}}
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                @if ($mhs_plp_1->tgl_pembayaran != null)
                                    {{$mhs_plp_1->tgl_pembayaran}}
                                @else
                                    {{'-'}}
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                @if ($mhs_plp_1->tgl_verifikasi != null)
                                    {{$mhs_plp_1->tgl_verifikasi}}
                                @else
                                    {{'-'}}
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="btn-group-vertical" style="width: 100%">
                                <a href="{{ route('form.edit.data.mhs', $mhs_plp_1->npm) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <button type="button" data-toggle="modal" data-target="#hapus-mhs" id="btn-hapus-plp-1"
                                    data-npm="{{ $mhs_plp_1->npm }}" class="btn btn-danger btn-sm">Hapus</button>
                                <a href="{{ route('form.detail.data.mhs', $mhs_plp_1->npm) }}"
                                    class="btn btn-info btn-sm">Detail</a>
                                @if ($mhs_plp_1->tgl_verifikasi == null)
                                    <a href="{{route('verifikasi', ['npm' => $mhs_plp_1->npm , 'type' => '0'])}}" class="btn btn-primary btn-sm"
                                    @if ($mhs_plp_1->tgl_pembayaran == null)
                                        style="pointer-events: none;"
                                    @endif
                                    >Verifikasi</a>
                                @else
                                    <a href="{{route('verifikasi', ['npm' => $mhs_plp_1->npm , 'type' => '1'])}}" class="btn btn-primary btn-sm">Batal Verifikasi</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
