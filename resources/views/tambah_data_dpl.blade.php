@extends('template/template_admin')
@section('conten')
    {{-- secction header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data DPL</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Data DPL</a></li>
                        <li class="breadcrumb-item">Tambah Data DPL</li>
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
                <h3 class="card-title">TambahData DPL</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <form action="{{ route('proses.simpan.dpl') }}" method="POST">
                @csrf
                <div class="card-body">
                    {{-- NIK/NIDN DPL --}}
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">NIK*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK DPL"
                                required oninvalid="this.setCustomValidity('NIK DPL Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" value="{{ old('nik') }}" />
                        </div>
                    </div>
                    {{-- Nama DPL --}}
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama DPL*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_dpl" name="nama_dpl" placeholder="Nama DPL"
                                required oninvalid="this.setCustomValidity('Nama DPL Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" value="{{ old('nama_dpl') }}" />
                        </div>
                    </div>
                    {{-- jenis Kelamin --}}
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin*</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin" required
                                oninvalid="this.setCustomValidity('Jenis Kelamin Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" />
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    {{-- fakultas --}}
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Fakultas*</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="fakultas" id="fakultas" required
                                oninvalid="this.setCustomValidity('Fakultas Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" />
                            <option value="" selected disabled>Pilih Fakultas</option>
                            @foreach ($list_fakultas as $fakultas_key => $fakultas)
                                <option value="{{ $fakultas_key }}">{{ $fakultas }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- program studi --}}
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Program Studi*</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="prodi" id="prodi" required
                                oninvalid="this.setCustomValidity('Program Studi Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" />
                            <option value="" selected disabled>Pilih Program Studi</option>
                            </select>
                        </div>
                    </div>
                    {{-- alamat --}}
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    {{-- no hp --}}
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">No Hp</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp">
                        </div>
                    </div>

                    <div class="btn-group float-right">
                        <div style="margin-right: 10px">
                            <button id="add" type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <div>
                            <button id="res" type="reset" class="btn btn-danger">Batal</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
    {{-- end section conten --}}

    <script>
        $(document).on('change', '#fakultas', function(e){
           var id_fakultas = $(this).val();
           var list_data = $.get("{{url('prodi/ajax-get')}}/" + id_fakultas);
           var html_prodi = '';
           list_data.done(function(data){
               $('#prodi').empty();
               html_prodi += '<option value="" selected disabled>Pilih Program Studi</option>';
               $.each(data, function (index, value) { 
                   html_prodi += `<option value="${value.id}">${value.nama}</option>`;
               });
               $('#prodi').append(html_prodi);
           })
       })
   </script>

@endsection
