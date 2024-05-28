<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionCustomController extends Controller
{
    public function questionPHPEasy()
    {
        $questions = Question::with('answers')->where('pelajaran', 'PHP')->where('difficulty', 'easy')->limit(10)->get();
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
    }

    public function questionJavaScriptEasy()
    {
        $questions = Question::with('answers')->where('pelajaran', 'JavaScript')->where('difficulty', 'easy')->limit(10)->get();
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
    }

    public function questionPythonEasy()
    {
        $questions = Question::with('answers')->where('pelajaran', 'Python')->where('difficulty', 'easy')->limit(10)->get();
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
    }

    public function questionHtmlEasy()
    {
        $questions = Question::with('answers')->where('pelajaran', 'HTML')->where('difficulty', 'easy')->limit(10)->get();
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
    }

    public function questionPHPMedium()
    {
        $questions = Question::with('answers')->where('pelajaran', 'PHP')->where('difficulty', 'medium')->limit(10)->get();
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
    }

    public function questionJavaScriptMedium()
    {
        $questions = Question::with('answers')->where('pelajaran', 'JavaScript')->where('difficulty', 'medium')->limit(10)->get();
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
    }

    public function questionPythonMedium()
    {
        $questions = Question::with('answers')->where('pelajaran', 'Python')->where('difficulty', 'medium')->limit(10)->get();
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
    }

    public function questionHtmlMedium()
    {
        $questions = Question::with('answers')->where('pelajaran', 'HTML')->where('difficulty', 'medium')->limit(10)->get();
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
    }

    public function questionPHPHard()
    {
        $questions = Question::with('answers')->where('pelajaran', 'PHP')->where('difficulty', 'easy')->limit(10)->get();
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
    }

    public function questionJavaScriptHard()
    {
        $questions = Question::with('answers')->where('pelajaran', 'JavaScript')->where('difficulty', 'easy')->limit(10)->get();
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
    }

    public function questionPythonHard()
    {
        $questions = Question::with('answers')->where('pelajaran', 'Python')->where('difficulty', 'easy')->limit(10)->get();
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
    }

    public function questionHtmlHard()
    {
        $questions = Question::with('answers')->where('pelajaran', 'HTML')->where('difficulty', 'easy')->limit(10)->get();
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
    }
}