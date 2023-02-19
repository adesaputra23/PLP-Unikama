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
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ url('/') }}">Home</a></li>
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
                Download Sertifikat PLP</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="card">
                <form action="{{route('sertifikat.add.show')}}" method="POST">
                    @csrf
                    <div class="card-body">

                        {{-- jenis sertifikat --}}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jenis Sertifikat</label>
                            <select class="form-control" name="jenis_sertifikat" id="jenis_sertifikat" required
                                oninvalid="this.setCustomValidity('Jenis Sertifikat Tidak Boleh Kosong')"
                                oninput="this.setCustomValidity('')" />
                                <option value="" selected disabled>Pilih Jenis Sertifikat</option>
                                <option value="1">Mahasiswa</option>
                                <option value="2">DPL</option>
                                <option value="3">Guru Pamong</option>
                                <option value="4">Kepala Sekolah</option>
                            </select>
                        </div>

                        <div id="show-input"></div>

                        <div class="mb-3" style="float: right;">
                            <button type="submit" class="btn btn-primary">Download</button>
                            {{-- <button type="reset" class="btn btn-danger">Batal</button> --}}
                        </div>
                </form>
            </div>
        </div>
    </section>
    @include('sweetalert::alert')
    <script>
        $('#jenis_sertifikat').on('change', function(e){
            var jenis_sertifikat = $(this).val();
            var html1 = '';
            if (jenis_sertifikat == 1) {
                html1 += `
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NPM Mahasiswa</label>
                        <input type="number" class="form-control" id="npm" name="npm" placeholder="NPM" required
                            oninvalid="this.setCustomValidity('NPM tidak boleh kosong')"
                            oninput="this.setCustomValidity('')">
                    </div>
                `;
            }else if(jenis_sertifikat == 2){
                html1 += `
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NIK DPL</label>
                        <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK DPL" required
                            oninvalid="this.setCustomValidity('NIK tidak boleh kosong')"
                            oninput="this.setCustomValidity('')">
                    </div>
                `;
            }else if(jenis_sertifikat == 3){
                html1 += `
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NIK Guru Pamong</label>
                        <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK Guru Pamong" required
                            oninvalid="this.setCustomValidity('NIK tidak boleh kosong')"
                            oninput="this.setCustomValidity('')">
                    </div>
                `;
            }else{
                html1 += `
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NIK Kepala Sekolah</label>
                        <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK Kepala Sekolah" required
                            oninvalid="this.setCustomValidity('NIK tidak boleh kosong')"
                            oninput="this.setCustomValidity('')">
                    </div>
                `;
            }
            $('#show-input').empty().append(html1);
        })
    </script>
@endsection
