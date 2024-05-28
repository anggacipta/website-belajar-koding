<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    // app/Http/Controllers/API/QuestionController.php
    public function index()
    {
        $questions = Question::with('answers')->limit(10)->get();

        return response()->json([
            'response_code' => 0,
            'results' => $questions->map(function ($question) {
                return [
                    'type' => $question->type,
                    'difficulty' => $question->difficulty,
                    'pelajaran' => $question->pelajaran,
                    'category' => $question->category,
                    'question' => $question->question,
                    'correct_answer' => $question->correct_answer,
                    'incorrect_answers' => $question->answers->pluck('answer')->toArray(),
                ];
            }),
        ]);
//        return QuestionResource::collection($questions);
    }

    public function show(Question $question)
    {
        $question->load('answers');

        return response()->json([
            'response_code' => 0,
            'results' => [
                'type' => $question->type,
                'difficulty' => $question->difficulty,
                'category' => $question->category,
                'question' => $question->question,
                'correct_answer' => $question->correct_answer,
                'incorrect_answers' => $question->answers->pluck('answer')->toArray(),
            ],
        ]);
    }


}
