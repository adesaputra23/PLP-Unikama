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
                Pengumuman</h2>
            {{-- <img class="masthead-avatar mb-5" src="assets/img/Unikama.PNG" alt="..." /> --}}
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
            </div>

            {{-- <form action="{{ route('proses.add.zonasi') }}" method="POST"> --}}
            {{-- @csrf --}}

            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                        <label for="exampleFormControlInput1" class="form-label">NPM</label>
                                        <input type="number" class="form-control" id="npm" name="npm" placeholder="NPM" required
                                            oninvalid="this.setCustomValidity('NPM tidak boleh kosong')"
                                            oninput="this.setCustomValidity('')">
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <button type="button" class="btn btn-primary mt-2" id="tampilkan">Tampilkan</button>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Janis PLP</label>
                                <select class="form-select" aria-label="Default select example" id="jenis_plp"
                                    name="jenis_plp" required
                                    oninvalid="this.setCustomValidity('Jenis PLP tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')">
                                    <option value="" selected disabled>Pilih PLP</option>
                                    <option value="1">PLP I</option>
                                    <option value="2">PLP II</option>
                                </select>
                            </div> --}}
                        </div>
                        <div class="card">
                                <div class="card-body">
                                    <div class="load-tabel">
                                        <p class="text-center mt-2 text">Silahkan masukan NPM untuk menampilkan data</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-8">
                    <div class="card">
                        <p class="text-center mt-2 text">Silahkan Masukan NPM dan Jenis PLP Untuk Menmapilkan Data</p>
                        <div class="load-tabel">
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        {{-- </form> --}}


    </section>

    @include('sweetalert::alert')

    <script>
        $(document).on('click', '#tampilkan', function() {
            $('.load-tabel').empty().html('<p class="text-center mt-2">Mengambil Data....</p>');
            var npm = $('#npm').val();
            // $('#kode_sekolah').html('<option value="" selected disabled>Sedang mengambil data...</option>');
            $.ajax({
                type: "POST",
                url: "{{ url('ajax/pengumuman') }}",
                data: {
                    npm: npm,
                    _token: "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function(response) {
                    const list_data = response;
                    const status    = list_data.status;
                    if (status == 1) {
                        $('.load-tabel').empty().html('<p class="text-center mt-2">Belum melakukan pendaftaran.</p>');
                    }else if(status == 2){
                        $('.load-tabel').empty().html('<p class="text-center mt-2">Anda belum memilih penempatan sekolah.</p>');
                    }else{
                        const zonasi = list_data.get_mhs_zonasi;
                        const mahaiswa = zonasi.jointo_mhs;
                        const mitra_sekolah = zonasi.jointo_mitra_sekolah;
                        const kepsek = list_data.get_kepsek;
                        const guru_pamong = zonasi.jointo_guru_pamong;
                        const dpl = zonasi.jointo_dpl;
                        const prodi = list_data.list_prodi;
                        const fakultas = list_data.list_fakultas;

                        // log data
                        console.log(prodi);
                        console.log(fakultas);
                        console.log(mahaiswa);
                        console.log(mitra_sekolah);
                        console.log(kepsek);
                        console.log(zonasi);
                        console.log(guru_pamong);
                        console.log(dpl);

                        var url = "{{ url('pengumuman_pdf') }}";
                        var Html = '';
                        if (guru_pamong == null || dpl == null) {
                            $('.load-tabel').empty().html('<p class="text-center mt-2">Data masih diproses.</p>');
                        }else{
                            Html += `
                                <div class="mt-2" style="margin-left: 20px"><a href="${url + '/'+zonasi.id_zonasi}" class="btn btn-sm btn-primary" target="_blank">Cetak PDF</a></div>
                                <div class="card-body">
                                    <table class="table table-striped table-sm">
                                        <tbody>
                                            <tr>
                                                <th style="width: 240px">NPM</th>
                                                <td>${mahaiswa.npm}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Mahasiswa</th>
                                                <td>${mahaiswa.nama_mhs}</td>
                                            </tr>
                                            <tr>
                                                <th>Program Studi</th>
                                                <td>${prodi[mahaiswa.program_studi]}</td>
                                            </tr>
                                            <tr>
                                                <th>Fakultas</th>
                                                <td>${fakultas[mahaiswa.fakultas]}</td>
                                            </tr>
                                            <tr>
                                                <th>Penempatan Sekolah</th>
                                                <td>${mitra_sekolah.nama_sekolah}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Kepala Sekolah</th>
                                                <td>${kepsek.nama_kepsek}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Guru Pamong</th>
                                                <td>${guru_pamong.nama_guru_pamong}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama DPL</th>
                                                <td>${dpl.nama_dpl}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Daftar</th>
                                                <td>${mahaiswa.tgl_pendaftaran}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Zonasi</th>
                                                <td>${zonasi.created_at}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Varifikasi</th>
                                                <td>${mahaiswa.tgl_verifikasi}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Mulai PLP</th>
                                                <td>5 September 2023</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Berakhir PLP</th>
                                                <td>30 November 2023</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            `;
                            $('.load-tabel').empty().html(Html);
                        }
                        
                    }
                }
            });
        })
    </script>
@endsection
