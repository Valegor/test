<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Card;

class CardController extends Controller
{
    public function index()
    {
        $cards = DB::table('card')->paginate(8);
        return $cards;
    }

    public function show ($id)
    {
        $card = Card::select()->where('id', '=', $id)->get();
        return $card;
    }

    public function showCode ($code)
    {
        $card = Card::select()->where('code', '=', $code)->get();
        return $card;
    }

}
