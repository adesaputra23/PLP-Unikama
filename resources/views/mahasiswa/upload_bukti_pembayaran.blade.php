@extends('template/template_admin')
@section('conten')
    {{-- secction header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Upload Bukti Pembayaran PLP</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Upload Bukti Pembayaran PLP</li>
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
                <h3 class="card-title">Upload Bukti Pembayaran PLP</h3>

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
                            <table id="tabel1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama File</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if ($user->file_pembayaran == null)
                                            <td>Belum upload file pembayaran</td>
                                            <td style="width: 10%">
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#upload">Upload File</button>
                                            </td>
                                        @else
                                            <td><a href="" data-toggle="modal" data-target="#set-pembayaran" id="view-images" data-pembayaran="{{$user}}">{{$user->file_pembayaran}}</a></td>
                                            <td style="width: 10%">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#upload">Edit File</button>
                                            </td>
                                        @endif
                                    </tr>
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
    <div class="modal fade" id="upload">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-upload"></i> Upload File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('upload-bukti-pembayaran.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="npm" name="npm" placeholder="NPM" value="{{$user->npm}}">
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="file" class="form-control" name="bukti_bayar" id="inputGroupFile02" required 
                                oninvalid="this.setCustomValidity('File tidak boleh kosong')"
                                oninput="this.setCustomValidity('')">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                            <small>
                            <span>Node* : type file (<i>jpeg, jpg, png</i>) max : 2 mb</span>
                            </small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        {{-- modal seting pembayaran data mahasiswa --}}
        <div class="modal fade bd-example-modal-lg" id="set-pembayaran">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">File Foto Pembayaran PLP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <a id="download-file" href="..." class="btn btn-primary btn-sm btn-block"><i class="fas fa-download"></i> Download Images</a>
                            <span id="file-name" class="badge bg-warning">-</span>
                        </div>
                        <div class="text-center">
                            <img id="img-pembayaran" src="..." class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>

<script>
    $(document).on('click', '#view-images', function() {
        var data_mhs = $(this).data('pembayaran');
        var url_patch = "{{asset('file_bukti_pembayaran')}}" +'/'+ data_mhs.file_pembayaran;
        var url_download = "{{url('files-download')}}" +'/'+ data_mhs.file_pembayaran;
        $('#img-pembayaran').prop('src', url_patch);
        $('#file-name').text(data_mhs.file_pembayaran);
        $('#download-file').prop('href', url_download);
    });
</script>

@endsection
