<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Leaderboard;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaderboards = Leaderboard::orderBy('score', 'desc')->get();

        return response()->json($leaderboards);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'pelajaran' => 'required|string',
            'score' => 'required|integer',
        ]);

        $leaderboard = Leaderboard::create($validatedData);

        $response = [
            'id' => $leaderboard->id,
            'name' => $leaderboard->name,
            'pelajaran' => $leaderboard->pelajaran,
            'score' => $leaderboard->score,
            'created_at' => $leaderboard->created_at->toIso8601String(),
            'updated_at' => $leaderboard->updated_at->toIso8601String(),
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
