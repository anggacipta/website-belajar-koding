@extends('frontend.layouts.main')
@section('content')
    <header class="masthead" style="background-image: url('{{ asset('frontend/assets/img/fotis-fotopoulos-6sAl6aQ4OWI-unsplash.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Forums</h1>
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
                    <h1>Tanya di Forums</h1>
                    <form action="{{ route('forums.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="content">Pertanyaan</label>
                            <textarea class="form-control" id="content" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary my-3">Submit</button>
                    </form>
                    <section>
                        <div class="container my-5 py-5">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 col-lg-12">
                                    <div class="card text-body">
                                        <div class="p-4">
                                            <h4 class="mb-0">Semua Forum</h4>
                                            <p class="fw-light mb-4 pb-2">Komentar terbaru</p>
                                        </div>

                                        @foreach($forums as $forum)
                                            <div class="card-body p-4">
                                                <div class="d-flex flex-start">
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                         src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp" alt="avatar" width="60"
                                                         height="60" />
                                                    <div>
                                                        <h6 class="fw-bold mb-1">{{ $forum->user->name }}</h6>
                                                        <div class="d-flex align-items-center mb-3">
                                                            <p class="mb-0">
                                                                {{ $forum->created_at->diffForHumans() }}
                                                                <a href="{{ route('forum.details', $forum) }}"><span class="badge bg-success">Go Comment</span></a>
                                                            </p>
                                                        </div>
                                                        <p class="mb-0">
                                                            {{ $forum->content }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-0" style="height: 1px;" />
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <div class="container">

    </div>
@endsection
