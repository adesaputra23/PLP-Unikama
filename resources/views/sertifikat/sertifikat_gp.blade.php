<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url('');

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.page-break {
    page-break-after: always;
}

.table1, th, td {
    border: 1px solid #999;
    padding: 8px 20px;
}

.table1 {
    font-family: sans-serif;
    color: #232323;
    border-collapse: collapse;
}
.text-center{
    text-align: center;
}

</style>
<body>
    <img src="{{ storage_path('app/public/guru-pamong.jpg') }}" width="100%" alt="" 
        style="height: 48rem; width: 69rem; margin-left: 10px; margin-top: 10px; position: absolute; left: 0px; top: 0px; z-index: -1;">
    <p style="margin-top: 220px; text-align: center; vertical-align: middle; font-size: 18px"><i><b>{{$fix_no_sertifikat}}</b></i></p>
    {{-- <p style="margin-top: -5px; text-align: center; vertical-align: middle; font-size: 20px"><b>Kagiatan PLP II</b></p> --}}
    <p style="margin-top: 120px; text-align: center; vertical-align: middle; font-size: 20px; font-family: sans-serif;"><b>DIBERIKAN KEPADA</b></p>
    <p style="margin-top: -20px; text-align: center; vertical-align: middle; font-size: 30px; font-family: sans-serif;"><b>{{$gp->nama_guru_pamong}}</b></p>
    <p style="margin-top: -20px; text-align: center; vertical-align: middle; font-size: 20px; font-family: sans-serif;"><b>{{$gp->Kepsek->JointoMitraSekolah->nama_sekolah}}</b></p>
    <table style="width: 70%; margin-left: auto; margin-right: auto; margin-top: -30px;">
        <tbody>
            <tr>
                <td style="border: 0px">
                    <p style="margin-top: 20px; text-align: center; vertical-align: middle; font-size: 18px">Atas partisipasinya sebagai <b>Guru Pamong</b> pada <b>Pengenalan Lingkungan Persekolahan PLP</b></p>
                    <p style="margin-top: -15px; text-align: center; vertical-align: middle; font-size: 18px">Universitas PGRI Kanjuruhan Malang pada tanggal <b>5 September 2023 s.d 14 Oktober 2023</b></p>
                    <p style="margin-top: -15px; text-align: center; vertical-align: middle; font-size: 18px">(1920 Jam)</p>
                    <p style="margin-top: -17px; text-align: center; vertical-align: middle; font-size: 18px">dengan jumlah mahasiswa yang dibimbing {{$jumlah_mahasiswa}} orang.</p>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="page-break">
    </div>
    <br>
    <br>
    <h1 style="text-align: center">MATERI PEMBIMBINGAN</h1>
    <h1 style="text-align: center; margin-top: -20px;">PLP UNIKAMA</h1>
    <h2 style="text-align: center; margin-top: -20px;">5 September 2023 s.d 14 November 2023</h2>
    <br><br>
    <table class="table1" style="width: 80%; margin-left: auto; margin-right: auto; margin-top: 0px;">
        <tbody>
            <tr>
               <td class="text-center">No</td>
               <td class="text-center">Kegiatan</td>
               <td class="text-center">Pembimbingan/<br> Mahasiswa (Jam) *)</td>
               <td class="text-center">Jumlah<br> Mahasiswa</td>
               <td class="text-center">Total (Jam) *)</td>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td>Membimbing Sistem Organisasi dan Tata Kerja</td>
                <td class="text-center">48</td>
                <td class="text-center">{{$jumlah_mahasiswa}}</td>
                <td class="text-center">384</td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>Membimbing Kegiatan Budaya Sekolah</td>
                <td class="text-center">48</td>
                <td class="text-center">{{$jumlah_mahasiswa}}</td>
                <td class="text-center">384</td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>Membimbing Kegiatan Kurikuler, Kokurikuler, dan Ekstrakurikuler.</td>
                <td class="text-center">144</td>
                <td class="text-center">{{$jumlah_mahasiswa}}</td>
                <td class="text-center">1152</td>
            </tr>
            <tr>
                <td colspan="4" class="text-center"><h2>Jumlah</h2></td>
                <td class="text-center">1920**)</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
