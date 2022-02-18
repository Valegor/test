<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\StoreScoreRequest;
use App\Http\Resources\ScoreResource;

class ScoreController extends Controller
{

    public function top10()
    {
        // $score = Score::all()->orderBy('score', 'desc')->take(10)->get();
        $score = DB::table('users')
                ->select( 'email', 'name', 'score')
                ->where('score', '>', '0')
                ->orderBy('score', 'desc')
                ->take(10)
                ->get();
        return $score;
    }

    public function updateScore(Request $request)
    {
        $score = $request->input('score');
        $user_email = $request->input('user_email');

        $old_score = User::where('email', $user_email)->value('score');

        $score = (int)($old_score) + (int)($score);

        DB::update('update users set score = ? where email = ?',[$score, $user_email]);

        return $score;

    }

    public function delete(Request $request)
    {
        $user_email = $request->input('user_email');

        DB::table('score')->where('user_email', '=', $user_email)->delete();

        return response(null, Response::HTTP_NO_CONTENT);       
    }

    public function store(StoreScoreRequest $request)
    {
        $data = $request->all();

        $score = Score::create($data);

        return new ScoreResource($score);
    }

}