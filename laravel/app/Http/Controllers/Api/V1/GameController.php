<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Card;

class GameController extends Controller
{
    public function index()
    {
        $results = DB::table('game')
            ->join('user', 'game.author_id', '=', 'user.id')
            ->select('game.id', 'game.name', 'game.category_id',
            'game.category', 'game.subtitle', 'game.notes',
            'game.object', 'game.img', 
            'game.updated_at as date', 'game.author_id', 
            'user.username as author', 'user.email as author-email')
            ->where('game.aviable', 1)
            ->orderBy('game.updated_at', 'desc')
            ->paginate(25);

            return $results;
    }

    public function show ($id)
    {
        $results = DB::table('game')
            ->join('user', 'game.author_id', '=', 'user.id')
            ->select('game.id', 'game.name', 'game.category_id',
            'game.category', 'game.subtitle', 'game.notes',
            'game.object', 'game.img', 
            'game.updated_at as date', 'game.author_id', 
            'user.username as author', 'user.email as author-email')
            ->where('game.id', $id)
            ->where('game.aviable', 1)
            ->get();

            return $results;
    }

}
