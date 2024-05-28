<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => $this->type,
            'difficulty' => $this->difficulty,
            'category' => $this->category,
            'question' => $this->question,
            'correct_answer' => $this->correct_answer,
            'incorrect_answers' => $this->answers->pluck('answer')->toArray(),
        ];
    }
}
