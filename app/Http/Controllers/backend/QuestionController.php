<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('dashboard.questions.questions_table', compact('questions'));
    }

    public function create()
    {
        return view('dashboard.questions.tambah_questions');
    }

    public function store(QuestionRequest $request)
    {
        $validatedData = $request->validated();

        $question = Question::create($validatedData);

        foreach ($validatedData['incorrect_answers'] as $incorrect_answer) {
            Answer::create([
                'question_id' => $question->id,
                'answer' => $incorrect_answer,
            ]);
        }

        return redirect()->route('questions');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $incorrect_answers = $question->answers()->get();
        return view('dashboard.questions.edit_questions', compact('question', 'incorrect_answers'));
    }

    public function update(QuestionRequest $request, $id)
    {
        $validatedData = $request->validated();

        $question = Question::findOrFail($id);
        $question->update($validatedData);

        foreach ($validatedData['incorrect_answers'] as $index => $incorrect_answer) {
            $answer = $question->answers()->skip($index)->first();
            if ($answer) {
                $answer->update(['answer' => $incorrect_answer]);
            } else {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $incorrect_answer,
                ]);
            }
        }

        return new QuestionResource($question);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->answers()->delete();
        $question->delete();
        return redirect()->route('questions');
    }
}