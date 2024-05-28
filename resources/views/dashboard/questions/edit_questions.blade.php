@extends('dashboard.layouts.main')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <!-- ... -->
        <div class="row">
            <div class="col-xl-12">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <h4>Edit Questions</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('update.questions', $question->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Type:</label>
                                <select name="type" id="simple-input" class="form-control">
                                    <option value="multiple" {{ $question->type == 'multiple' ? 'selected' : '' }}>Multiple</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Difficulty:</label>
                                <select name="difficulty" id="simple-input" class="form-control">
                                    <option value="hard" {{ $question->difficulty == 'hard' ? 'selected' : '' }}>Hard</option>
                                    <option value="medium" {{ $question->difficulty == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="easy" {{ $question->difficulty == 'easy' ? 'selected' : '' }}>Easy</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Pelajaran:</label>
                                <select name="pelajaran" id="simple-input" class="form-control">
                                    <option value="Python" {{ $question->pelajaran == 'Python' ? 'selected' : '' }}>Python</option>
                                    <option value="JavaScript" {{ $question->pelajaran == 'JavaScript' ? 'selected' : '' }}>JavaScript</option>
                                    <option value="PHP" {{ $question->pelajaran == 'PHP' ? 'selected' : '' }}>PHP</option>
                                    <option value="HTML" {{ $question->pelajaran == 'HTML' ? 'selected' : '' }}>HTML</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Category:</label>
                                <select name="category" id="simple-input" class="form-control">
                                    <option value="belajar_koding" {{ $question->category == 'belajar_koding' ? 'selected' : '' }}>Belajar Koding</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Question</label>
                                <input type="text" id="simpleinput" name="question" class="form-control" value="{{ $question->question }}">
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Correct Answer:</label>
                                <input type="text" id="simpleinput" name="correct_answer" class="form-control" value="{{ $question->correct_answer }}">
                            </div>
                            @foreach ($incorrect_answers as $index => $incorrect_answer)
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Incorrect Answer {{ $index + 1 }}:</label>
                                    <input type="text" id="simpleinput" name="incorrect_answers[]" class="form-control" value="{{ $incorrect_answer->answer }}">
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
    </div>
    <!-- container -->
@endsection
