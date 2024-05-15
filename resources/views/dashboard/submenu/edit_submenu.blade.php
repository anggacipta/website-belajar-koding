@extends('dashboard.layouts.main')
@section('content')
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
                        <h4>Edit Submenu</h4>
                        <form action="{{ route('update.submenu') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $submenu->id }}">
                            <div class="mb-3">
                                <label class="form-label" for="inputSubmenu">Pilih Menu</label>
                                    <select name="menu_id" class="form-select" id="inputSubmenu">
                                        @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}" {{ $submenu->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->nama_menu }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Nama Submenu</label>
                                <input type="text" id="simpleinput" name="nama_submenu" value="{{ $submenu->nama_submenu }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Summary Submenu</label>
                                <textarea name="summary" class="form-control" rows="10" maxlength="100">{{ $submenu->summary }}</textarea>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="example-fileinput" class="form-label">Submenu Photo</label>
                                <input type="file" id="image" name="submenu_img" class="form-control">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <img src="{{ asset($submenu->submenu_img) }}" class="img-thumbnail" width="300" height="300"
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
