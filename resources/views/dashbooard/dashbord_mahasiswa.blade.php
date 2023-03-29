@php
use App\Mahasiswa;
use App\MitraSekolah;
use App\Dpl;
use App\Penilaian;
use App\PenilaianDPl;
@endphp

<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div style="margin-left: 80px; margin-top: 90px;">
                        <h3>Selamat Datang, <b>{{Auth::user()->get_mahasiswa->nama_mhs}}</b></h3>
                        <p>
                            Selamat datang di sistem kegiatan pelaksanaan,
                            <br>
                            Program Pengenalan Lingkungan Persekolahan (PLP)
                        </p>
                        <p></p>
                    </div>
                </div>
                <div class="co-md-6">
                    <img style="width: 350px; margin-left: 120px" src="{{ asset('images/dashboard.png') }}"
                        class="rounded float-right" alt="...">
                </div>
            </div>
        </div>
    </div>
</section>
