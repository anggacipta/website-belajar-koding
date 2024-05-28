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
                        <h4>Tambah Questions</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('store.questions') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Type:</label>
                                <select name="type" id="simple-input" class="form-control">
                                    <option value="multiple">Multiple</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Difficulty:</label>
                                <select name="difficulty" id="simple-input" class="form-control">
                                    <option value="hard">Hard</option>
                                    <option value="medium">Medium</option>
                                    <option value="easy">Easy</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Pelajaran:</label>
                                <select name="pelajaran" id="simple-input" class="form-control">
                                    <option value="Python">Python</option>
                                    <option value="JavaScript">JavaScript</option>
                                    <option value="PHP">PHP</option>
                                    <option value="HTML">HTML</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Category:</label>
                                <select name="category" id="simple-input" class="form-control">
                                    <option value="belajar_koding">Belajar Koding</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Question</label>
                                <input type="text" id="simpleinput" name="question" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Correct Answer:</label>
                                <input type="text" id="simpleinput" name="correct_answer" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Incorrect Answer:</label>
                                <input type="text" id="simpleinput" name="incorrect_answers[]" class="form-control">
                                <input type="text" id="simpleinput" name="incorrect_answers[]" class="form-control">
                                <input type="text" id="simpleinput" name="incorrect_answers[]" class="form-control">
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
