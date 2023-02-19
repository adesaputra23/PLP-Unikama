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
                Upload Bukti Pembayaran PLP
            </h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="card">
                <form action="{{route('upload-bukti-pembayaran.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">NPM</label>
                            <input type="number" class="form-control" id="npm" name="npm" placeholder="NPM" required
                                oninvalid="this.setCustomValidity('NPM tidak boleh kosong')"
                                oninput="this.setCustomValidity('')" value="{{old('npm') ?? app('request')->input('npm')}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">File</label>
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

                        <div class="mb-3" style="float: right;">
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <button type="reset" class="btn btn-danger">Batal</button>
                        </div>
                </form>
            </div>
        </div>
    </section>

    @include('sweetalert::alert')
@endsection
