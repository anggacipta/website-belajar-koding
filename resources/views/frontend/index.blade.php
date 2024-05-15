@extends('frontend.layouts.main')
@section('content')
     <!-- Page Header-->
     <header class="masthead" style="background-image: url('{{ asset('frontend/assets/img/ilya-pavlov-OqtafYT5kTw-unsplash.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>Kodingku</h1>
                        <span class="subheading">Belajar Koding Bersamaku</span>
                        <span class="meta">
                        Photo by
                        <a href="https://unsplash.com/@ilyapavlov?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Ilya Pavlov</a>
                        on
                        <a href="https://unsplash.com/photos/https://unsplash.com/photos/monitor-showing-java-programming-OqtafYT5kTw?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach($post as $p)
                    <div class="post-preview">
                        <a href="{{ url('post/belajar/'.$p->id) }}">
                            <h2 class="post-title">{{ $p->judul_post }}</h2>
                            <h3 class="post-subtitle">{!! \Illuminate\Support\Str::limit($p->isi_post, 50)  !!}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="{{ url('post/belajar/'.$p->id) }}">{{ $p->user->name }}</a>
                            {{ $p->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
            </div>
        </div>
    </div>
@endsection
