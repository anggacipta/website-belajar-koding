@extends('frontend.layouts.main')

@section('content')
    <!-- Page Header-->
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
                    <section>
                        <div class="container my-5 py-5">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-start align-items-center">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                                                     height="60" />
                                                <div>
                                                    <h6 class="fw-bold text-primary mb-1">Lily Coleman</h6>
                                                    <p class="text-muted small mb-0">
                                                        Shared publicly - Jan 2020
                                                    </p>
                                                </div>
                                            </div>

                                            <p class="mt-3 mb-4 pb-2">
                                                {{ $post->content }}
                                            </p>
                                        </div>
                                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                            <div class="d-flex flex-start w-100">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                                                     height="40" />
                                                <div data-mdb-input-init class="form-outline w-100">
                                                    <form action="{{ route('comments.store', $post) }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="content">Comment</label>
                                                            <textarea class="form-control" id="textAreaExample" rows="4"
                                                                      style="background: #fff;" name="content"></textarea>
                                                        </div>
{{--                                                        <button type="submit" class="btn btn-primary">Submit</button>--}}
                                                        <div class="float-end mt-2 pt-1">
                                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm">Post comment</button>
                                                            <button type="reset" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm">Cancel</button>
                                                        </div>
                                                    </form>
                                                    <label class="form-label" for="textAreaExample">Message</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="gradient-custom">
                        <div class="container my-5 py-5">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <h4 class="text-center mb-4 pb-2">Komentar</h4>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-flex flex-start">
                                                        <div class="flex-grow-1 flex-shrink-1">
                                                            @foreach($post->comment as $comment)
                                                            <div class="mt-4">
                                                                <img class="rounded-circle shadow-1-strong me-3"
                                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar" width="65"
                                                                     height="65" />
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <p class="mb-1">
                                                                        {{ $comment->user->name }} <span class="small">- {{ $comment->created_at->diffForHumans() }}</span>
                                                                    </p>
                                                                    <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                                                                </div>
                                                                <p class="small mb-0">
                                                                    {{ $comment->content }}
                                                                </p>
                                                                <form action="{{ route('replies.store', $comment) }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group mt-3">
                                                                        <label for="content small">Add Reply</label>
                                                                        <textarea class="form-control" cols="50" id="content" name="content"></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-dark mt-1">Send</button>
                                                                </form>
                                                            </div>

                                                                @foreach($comment->reply as $reply)
                                                                    <div class="d-flex flex-start mt-4">
                                                                        <img class="rounded-circle shadow-1-strong me-3"
                                                                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(11).webp" alt="avatar"
                                                                             width="65" height="65" />
                                                                        <div>
                                                                            <h6 class="fw-bold mb-1">{{ $reply->user->name }}</h6>
                                                                            <div class="d-flex align-items-center mb-3">
                                                                                <p class="mb-0">
                                                                                    {{ $reply->created_at->diffForHumans() }}
                                                                                </p>
                                                                            </div>
                                                                            <p class="mb-0">
                                                                                {{ $reply->content }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
