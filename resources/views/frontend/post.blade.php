@extends('frontend.layouts.main')
@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url('{{ asset('frontend/assets/img/arnold-francisca-f77Bh3inUpE-unsplash.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $menu->nama_menu }}</h1>
                    <h2 class="subheading"></h2>
                    <span class="meta">
                        Photo by
                        <a href="https://unsplash.com/@clark_fransa?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Arnold Francisca</a>
                        on
                        <a href="https://unsplash.com/photos/turned-on-macbook-pro-wit-programming-codes-display-f77Bh3inUpE?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
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
            @foreach($submenu as $sub)
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mx-2 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($sub->submenu_img) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $sub->nama_submenu }}</h5>
                            <p class="card-text">{{ $sub->summary }}</p>
                            <a href="{{ url('belajar/'.$sub->id) }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</article>
@endsection
