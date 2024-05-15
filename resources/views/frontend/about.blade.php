@extends('frontend.layouts.main')
@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url('{{ asset('frontend/assets/img/fotis-fotopoulos-6sAl6aQ4OWI-unsplash.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Kodingku</h1>
                    <span class="subheading">Belajar Koding Bersamaku</span>
                    Photo by <a href="https://unsplash.com/@ffstop?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" class="text-light">Fotis Fotopoulos</a> on <a href="https://unsplash.com/photos/black-remote-control-on-red-table-6sAl6aQ4OWI?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" class="text-light">Unsplash</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Website ini dibuat untuk belajar koding mulai dari dasar. Webiste ini cocok untuk pemula yang baru ingin belajar koding.</p>
                <p>Untuk saat ini materi yang tersedia masih berupa artikel. Kedepannya akan kami tingkatkan lagi agar belajar koding semakin menarik</p>
                <p>Selamat belajar koding dan sukses selalu!!!</p>
            </div>
        </div>
    </div>
</main>
@endsection
