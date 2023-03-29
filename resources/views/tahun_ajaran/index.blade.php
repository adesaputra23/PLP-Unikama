@extends('template/template_admin')
@section('conten')
    {{-- secction header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tahun Ajaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Tahun Ajaran</li>
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
                <h3 class="card-title">Tahun Ajaran</h3>

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
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group">
                            <button type="button" id="btn-add" data-toggle="modal" data-target="#add-data" class="btn btn-primary">
                                Tambah Tahun Ajaran
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-custom-content"></div>
                <div class="mt-2">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1-tab">
                        <div class="table-responsive">
                            <table id="tabel1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">Status Aktif</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_tahun_ajaran as $key => $value)
                                        <tr>
                                            <td class="text-center">{{$key + 1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->tahun}}</td>
                                            <td class="text-center">{{$value->status == 1 ? 'Aktif' : 'Non Aktif'}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>
                                                <button 
                                                    type="button" 
                                                    data-toggle="modal"
                                                    data-target="#add-data"
                                                    id="btn-edit"
                                                    data-tahun="{{$value}}"
                                                    class="btn btn-warning btn-sm">
                                                    Edit
                                                </button>
                                                <button 
                                                    type="button" 
                                                    id="btn-hapus"
                                                    data-toggle="modal"
                                                    data-tahun="{{$value}}"
                                                    data-target="#hapus"
                                                    class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    {{-- end section conten --}}

    {{-- modal hapus data dpl --}}
    <div class="modal fade" id="hapus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-trash-alt"></i> Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('tahun.ajaran.hapus') }}" method="post">
                    @csrf
                    <div class="modal-body text-center">
                        <input type="hidden" id="hapus_id_tahun_ajaran" name="id_tahun_ajaran">
                        <p>Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Hapus</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal add data --}}
    <div class="modal fade bd-example-modal-lg" id="add-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('tahun.ajaran.save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id_tahun_ajaran" name="id_tahun_ajaran">

                        <div class="form-group">
                            <label for="nama">Nama Tahun Ajaran</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="exp.Tahun ajaran periode 2022-2023" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Tahun</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" placeholder="exp.2023" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Status Aktif</label>
                            <select class="form-control form-control" id="status" name="status">
                                <option value="" selected disabled>Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="2">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" value="simpan" name="action" id="btn-simpan">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    <script>
        $('#tabel1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $(document).on('click', '#btn-add', function(e){
            $('#id_tahun_ajaran').val('');
            $('#id_tahun_ajaran').attr('disabled', true);
            $('#nama').val('');
            $('#tahun').val('');
            $('#status').val('');
            $('#btn-simpan').val('simpan');
        });

        $(document).on('click', '#btn-edit', function(e){
            var data = $(this).data('tahun');
            $('#id_tahun_ajaran').val(data.id_tahun_ajran);
            $('#id_tahun_ajaran').attr('disabled', false);
            $('#nama').val(data.name);
            $('#tahun').val(data.tahun);
            $('#status').val(data.status);
            $('#btn-simpan').val('edit');
        });

        $(document).on('click', '#btn-hapus', function(e){
            var data = $(this).data('tahun');
            $('#hapus_id_tahun_ajaran').val(data.id_tahun_ajran);
        });

    </script>

@endsection
