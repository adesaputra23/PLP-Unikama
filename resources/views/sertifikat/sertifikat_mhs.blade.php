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

</style>
<body>
    <img src="{{ storage_path('app/public/mhasiswa.jpg') }}" width="100%" alt="" 
        style="height: 48rem; width: 69rem; margin-left: 10px; margin-top: 10px; position: absolute; left: 0px; top: 0px; z-index: -1;">
    <p style="margin-top: 315px; text-align: center; vertical-align: middle; font-size: 18px"><i><b>{{$fix_no_sertifikat}}</b></i></p>
    {{-- <p style="margin-top: -5px; text-align: center; vertical-align: middle; font-size: 20px"><b>Kagiatan PLP II</b></p> --}}
    <p style="margin-top: 70px; text-align: center; vertical-align: middle; font-size: 30px"><b>{{$mhs->nama_mhs}}</b></p>
    <p style="margin-top: -30px; text-align: center; vertical-align: middle; font-size: 25px"><b>{{$mhs->npm}}</b></p>
    <p style="margin-top: -20px; text-align: center; vertical-align: middle; font-size: 18px"><b>{{$list_prodi[$mhs->program_studi]}}</b></p>
    <table style="width: 60%; margin-left: auto; margin-right: auto; margin-top: -20px;">
        <tbody>
            <tr>
                <td>
                    <p style="margin-top: 20px; text-align: center; vertical-align: middle; font-size: 18px">Sebagai peserta pada kegiatan <b>Pengenalan Lingkungan Persekolahan PLP<b></p>
                    <p style="margin-top: -15px; text-align: center; vertical-align: middle; font-size: 18px">Universitas PGRI Kanjuruhan Malang yang diselenggarakan di</p>
                    <p style="margin-top: -15px; text-align: center; vertical-align: middle; font-size: 18px"><b>{{$mhs->JointoZonasi->JointoMitraSekolah->nama_sekolah}}<b></p>
                    <p style="margin-top: -17px; text-align: center; vertical-align: middle; font-size: 18px">pada tanggal <b>5 September 2023 s.d 30 November 2023<b></p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
