@extends('dashboard.layouts.main')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex align-items-center mb-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-0" id="dash-daterange">
                                <span class="input-group-text bg-blue border-blue text-white">
                                                <i class="mdi mdi-calendar-range"></i>
                                            </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <h4>Edit Post Belajar</h4>
                        <form action="{{ route('update.post', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <div class="mb-3">
                                <label class="form-label" for="inputSubmenu">Pilih Submenu</label>
                                @foreach($submenu as $item)
                                    <select name="submenu_id" class="form-select" id="inputSubmenu">
                                        <option value="{{ $item->id }}" {{ $post->submenu_id == $item->id ? 'selected' : '' }}>{{ $item->nama_submenu }}</option>
                                    </select>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Judul Post</label>
                                <input type="text" id="simpleinput" name="judul_post" value="{{ $post->judul_post }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <textarea id="textarea" name="isi_post">
                                  {!! $post->isi_post !!}
                                </textarea>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="example-fileinput" class="form-label">Post Photo</label>
                                <input type="file" id="image" name="gambar_post" class="form-control">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <img src="{{ asset($post->gambar_post) }}" class="img-thumbnail" width="300" height="300"
                                     alt="post-image" id="showImage">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->

    </div>
    <!-- container -->

    <script>
        $(document).ready(function(){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
