<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2-tab">
    <div class="table-responsive">
        <table id="example2" class="table table-bordered table-striped table-sm" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th width="10%">NPM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Fakultas</th>
                    <th>Kelas</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Tanggal Verifikasi</th>
                    <th style="width: 8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_mhs_plp_2 as $plp_2 => $mhs_plp_2)
                    <tr>
                        <td class="text-center">{{$plp_2 + 1}}</td>
                        <td>{{ $mhs_plp_2->npm }}</td>
                        <td>{{ $mhs_plp_2->nama_mhs }}</td>
                        <td>
                            {{ $list_prodi[$mhs_plp_2->program_studi] }}
                        </td>
                        <td>
                            {{ $list_fakultas[$mhs_plp_2->fakultas] }}
                        </td>
                        <td>
                            {{ $list_kelas[$mhs_plp_2->kelas] }}
                        </td>
                        <td>
                            <div class="text-center">
                                @if ($mhs_plp_2->tgl_pendaftaran != null)
                                    {{$mhs_plp_2->tgl_pendaftaran}}
                                @else
                                    {{'-'}}
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                @if ($mhs_plp_2->tgl_pembayaran != null)
                                    {{$mhs_plp_2->tgl_pembayaran}}
                                @else
                                    {{'-'}}
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                @if ($mhs_plp_2->tgl_verifikasi != null)
                                    {{$mhs_plp_2->tgl_verifikasi}}
                                @else
                                    {{'-'}}
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="btn-group-vertical" style="width: 100%">
                                <a href="{{ route('form.edit.data.mhs', $mhs_plp_2->npm) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <button type="button" data-toggle="modal" data-target="#hapus-mhs" id="btn-hapus-plp-2"
                                    data-npm="{{ $mhs_plp_2->npm }}" class="btn btn-danger btn-sm">Hapus</button>
                                <a href="{{ route('form.detail.data.mhs', $mhs_plp_2->npm) }}"
                                    class="btn btn-info btn-sm">Detail</a>
                                @if ($mhs_plp_2->tgl_verifikasi == null)
                                    <a href="{{route('verifikasi', ['npm' => $mhs_plp_2->npm , 'type' => '0'])}}" class="btn btn-primary btn-sm"
                                        @if ($mhs_plp_2->tgl_pembayaran == null)
                                             style="pointer-events: none;"
                                        @endif
                                    >Verifikasi</a>
                                @else
                                    <a href="{{route('verifikasi', ['npm' => $mhs_plp_2->npm , 'type' => '1'])}}" class="btn btn-primary btn-sm">Batal Verifikasi</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
