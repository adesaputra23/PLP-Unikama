@extends('template/template_admin')
@section('conten')
    {{-- secction header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pemilihan Penempatan Sekolah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Pemilihan Penempatan Sekolah</li>
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
                <h3 class="card-title">Pemilihan Penempatan Sekolah</h3>

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
                                <button id="btn-set-sekolah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#set-sekolah" data-mhs="{{$user}}">Pilih Sekolah</button>
                            @else
                                <table id="tabel1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Kode</th>
                                            <th class="text-center">Nama Sekolah</th>
                                            <th class="text-center">Kepala Sekolah</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$user->JointoZonasi->JointoMitraSekolah->kode_sekolah}}</td>
                                            <td>{{$user->JointoZonasi->JointoMitraSekolah->nama_sekolah}}</td>
                                            <td>{{$user->JointoZonasi->JointoMitraSekolah->JointoKepsek->nama_kepsek}}</td>
                                            <td style="width: 10">
                                                <button {{($user->JointoZonasi->id_guru_pamong != null || $user->JointoZonasi->id_dpl != null) ? 'disabled' : ''}} id="btn-set-sekolah" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#set-sekolah" data-mhs="{{$user}}">Ubah Sekolah</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    {{-- end section conten --}}

    {{-- modal hapus data dpl --}}
    <div class="modal fade" id="set-sekolah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-upload"></i> Pilih Sekolah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('proses.add.zonasi') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="npm" name="npm" placeholder="NPM" value="{{$user->npm}}">
                        <div id="text-info"><p></p></div>
                        <div id="form-show" style="display: none;">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Janis PLP</label>
                                <input type="text" class="form-control" id="jenis_plp" name="jenis_plp" placeholder="Jenis PLP" readonly required
                                    oninvalid="this.setCustomValidity('Jenis PLP tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Sekolah</label>
                                <select class="form-select form-control" aria-label="Default select example" id="kode_sekolah"
                                    name="kode_sekolah" required
                                    oninvalid="this.setCustomValidity('Sekolah tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')">
                                    <option value="" selected disabled>Pilih Sekolah</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-submit" type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '#btn-set-sekolah', function() {
            var data_mhs = $(this).data('mhs');
            var npm = data_mhs.npm;
            $.ajax({
                type: "POST",
                url: "{{ url('ajax/jenis_plp') }}",
                data: {
                    npm: npm,
                    _token: "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#text-info').css('display', 'none');
                    $('#form-show').css('display', 'none');
                    const list_plp = response.list_plp;
                    const mhs = response.mhasiswa;
                    if (mhs.tgl_pembayaran == null) {
                        $('#form-show').css('display', 'none');
                        $('#text-info').css('display', 'block');
                        $('#btn-submit').css('display', 'none');
                        $('#text-info').text('Silahkan upload bukti pembayaran terlebih dulu!');
                    }else{
                        $('#text-info').css('display', 'none');
                        $('#form-show').css('display', 'block');
                        $('#btn-submit').css('display', 'block');
                        var ListData = list_plp;
                        var DataHtml = '';
                        var plp = (mhs.jenis_plp == 1) ? 'PLP I' : 'PLP II';
                        $('#jenis_plp').val(plp);
                        DataHtml += '<option value="" selected disabled>~Sekolah~</option>';
                        $.each(ListData, function(index, value) {
                            DataHtml += '<option value="' + value.kode_sekolah + '">' + value
                                .kode_sekolah + ' ~ ' + value.nama_sekolah + '</option>';
                        });
                        $('#kode_sekolah').html(DataHtml);
                    }
                }
            });
        });
    </script>
@endsection
