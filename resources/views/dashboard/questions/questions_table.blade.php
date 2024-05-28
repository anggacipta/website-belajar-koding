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
                        <h4>Table Questions</h4>
                        <table id="myTable">
                            <thead>
                            <th>No</th>
                            <th>Tipe Pertanyaan</th>
                            <th>Kesulitan</th>
                            <th>Pelajaran</th>
                            <th>Pertanyaan</th>
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $question->type }}</td>
                                    <td>{{ $question->difficulty }}</td>
                                    <td>{{ $question->pelajaran }}</td>
                                    <td>{{ $question->question }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('edit.questions', $question->id) }}" class="btn btn-warning me-2">Edit</a>
                                            <form action="{{ route('delete.questions', $question->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->

    </div>
    <!-- container -->
@endsection

