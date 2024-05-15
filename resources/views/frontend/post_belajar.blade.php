@extends('frontend.layouts.main')
@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $postBelajar->judul_post }}</h1>
                        <span class="meta">
                        Posted by
                        <a href="#!">{{ $postBelajar->user->name }}</a>
                        on August 24, 2023
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                   <p>{{ $postBelajar->isi_post }}</p>
                </div>
            </div>
        </div>
    </article>
@endsection
