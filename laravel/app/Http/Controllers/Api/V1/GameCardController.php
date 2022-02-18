<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GameCardController extends Controller
{

    public function show ($id)
    {
        $results = DB::table('game_card')
            ->select('game_card.card_id',
            'game_card.card_img as img',
            'game_card.card_name as card',
            'game_card.card_category as category')
            ->where('game_card.game_id', $id)
            ->get();

            return $results;
    }

}
