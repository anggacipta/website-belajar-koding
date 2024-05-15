@extends('frontend.layouts.main')
@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url({{ asset('frontend/assets/img/florian-olivo-4hbJ-eymZ1o-unsplash.jpg') }})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $submenu->nama_submenu }}</h1>
                        <h2 class="subheading">{{ $submenu->summary }}</h2>
                        <span class="meta">
                        Photo by
                        <a href="https://unsplash.com/@florianolv?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">FLorian Olivo</a>
                        on
                        <a href="https://unsplash.com/photos/turned-on-macbook-pro-wit-programming-codes-display-f77Bh3inUpE?https://unsplash.com/photos/lines-of-html-codes-4hbJ-eymZ1o?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <h3 class="my-2">Materi Belajar</h3>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                @foreach($belajar as $bel)
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mx-2 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($bel->gambar_post) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $bel->judul_post }}</h5>
                            <p class="card-text">{!! \Illuminate\Support\Str::limit($bel->isi_post, 50)  !!}...</p>
                            <a href="{{ url('post/belajar/'.$bel->id) }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </article>
@endsection
