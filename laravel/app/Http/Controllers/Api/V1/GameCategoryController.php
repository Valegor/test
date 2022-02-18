<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameCategoryResource;
use Illuminate\Http\Request;
use App\Models\GameCategory;
use Illuminate\Support\Facades\DB;
use App\Models\Card;

class GameCategoryController extends Controller
{
    public function index()
    {
        $categories = GameCategory::select('id', 'category', 'img')->get();
        return GameCategoryResource::collection($categories);
    }

    public function show($id)
    {
        $results = DB::table('game')
            ->join('user', 'game.author_id', '=', 'user.id')
            ->select('game.id', 'game.name', 'game.category_id',
            'game.category', 'game.subtitle', 'game.notes',
            'game.object', 'game.img', 
            'game.updated_at as date', 'game.author_id', 
            'user.username as author', 'user.email as author-email')
            ->where('game.category_id', $id)
            ->where('game.aviable', 1)
            ->orderBy('game.updated_at', 'desc')
            ->paginate(10);

            return $results;
    }

}
