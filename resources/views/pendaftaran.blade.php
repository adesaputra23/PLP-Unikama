@extends('template.template_conten')
@section('conten')
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">PLP-UNIKAMA</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    {{-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ url('/') }}">Home</a></li> --}}
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container mt-4">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 mt-5" style="margin-top: 50%;">
                Pendaftaran PLP</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="card">
                <form action="{{route('pendaftaran-plp.pendaftaran')}}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">NPM</label>
                            <input type="number" class="form-control" id="npm" name="npm" placeholder="NPM" required
                                oninvalid="this.setCustomValidity('NPM tidak boleh kosong')"
                                oninput="this.setCustomValidity('')">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required
                                oninvalid="this.setCustomValidity('Nama tidak boleh kosong')"
                                oninput="this.setCustomValidity('')">
                        </div>

                        {{-- fakultas --}}
                        <div class="mb-3">
                            <label for="inputEmail3" class="col-form-label">Fakultas</label>
                            <select class="form-control" name="fakultas" id="fakultas" required
                                oninvalid="this.setCustomValidity('Fakultas Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" />
                                <option value="" selected disabled>Pilih Fakultas</option>
                                @foreach ($list_fakultas as $fakultas_key => $fakultas)
                                    <option value="{{ $fakultas_key }}">{{ $fakultas }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- program studi --}}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Program Studi</label>
                            <select class="form-control" name="prodi" id="prodi" required
                                oninvalid="this.setCustomValidity('Program Studi Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" />
                                <option value="" selected disabled>Pilih Program Studi</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Angkatan</label>
                            <input type="number" class="form-control" id="angkatan" name="angkatan" placeholder="Angkatan" required
                                oninvalid="this.setCustomValidity('Angkatan tidak boleh kosong')"
                                oninput="this.setCustomValidity('')">
                        </div>

                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label">IPK</label>
                            <input type="text" class="form-control" id="ipk" name="ipk" placeholder="IPK" required
                                oninvalid="this.setCustomValidity('IPK tidak boleh kosong')"
                                oninput="this.setCustomValidity('')">
                        </div>

                        {{-- kelas --}}
                        <div class="mb-2">
                            <label for="inputEmail3" class="col-form-label">Kelas</label>
                            <select class="form-control" name="kelas" id="kelas" required
                                oninvalid="this.setCustomValidity('Kelas Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" />
                            <option value="" selected disabled>Pilih Kelas</option>
                            <option value="1">Kelas Reguler</option>
                            <option value="2">Kelas Karyawan</option>
                            </select>
                        </div>

                        {{-- agama --}}
                        <div class="mb-2">
                            <label for="inputEmail3" class="col-form-label">Agama</label>
                            <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" required>
                        </div>

                        {{-- jenis Kelamin --}}
                        <div class="mb-2">
                            <label for="inputEmail3" class="col-form-label">Jenis Kelamin*</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required
                                oninvalid="this.setCustomValidity('Jenis Kelamin Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" />
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>

                        {{-- alamat --}}
                        <div class="mb-2">
                            <label for="inputEmail3" class="col-form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat"
                                placeholder="Alamat"></textarea>
                        </div>

                        {{-- jenis plp --}}
                        <div class="mb-2">
                            <label for="inputEmail3" class="col-form-label">Jenis PLP</label>
                            <select class="form-control" name="jenis_plp" id="jenis_plp" required
                                oninvalid="this.setCustomValidity('Jenis PLP Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" />
                                <option value="" selected disabled>Pilih Jenis PLP</option>
                                <option value="1">PLP I</option>
                                <option value="2">PLP II</option>
                            </select>
                        </div>

                         {{-- no hp --}}
                        <div class="mb-4">
                            <label for="inputEmail3" class="col-form-label">No Hp</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp">
                        </div>

                        <div class="mb-3" style="float: right;">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Batal</button>
                        </div>
                </form>
            </div>
        </div>
    </section>

    @include('sweetalert::alert')
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
