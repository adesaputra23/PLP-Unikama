<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
</head>
<body>
    <div class="yeald-header">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row" style="width: 10%">
                         <img src="{{ storage_path('app/public/logo-unikama.jpg') }}" height="90px" alt="">
                    </th>
                    <th scope="row">
                        <h6>LEMBAGA PENGEMBANGAN PEMBELAJARAN</h6>
                        <h6 style="margin-top: -8px">DAN PRAKTIK LAPANGAN (LP3L)</h6>
                        <h6 style="margin-top: -8px">UNIVERSITAS PGRI KANJURUHAN MALANG</h6>
                        <p style="font-size: 0.8rem; margin-top: -10px;">Jl. S. Supriadi 48 Malang, Telp. 801488 ext. 107 – Gedung A Lt. 2</p>
                        <p style="font-size: 0.8rem; margin-top: -20px;">Website: lp3l.unikama.ac.id email: lp3l@unikama.ac.id</p>
                    </th>
                    <th scope="row" style="width: 15%"></th>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <hr style=" border: 1px solid black;"> --}}
    <div class="yeald-content">
        @yield('conten')
    </div>
</body>
</html>