<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Card;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'img')->where('aviable', '1')->paginate(10);
        return CategoryResource::collection($categories);
    }

    public function catImg()
    {
//        SELECT category.id, category.name, card.backimg FROM category, card WHERE card.category_id = category.id
        
        $results = DB::select('select distinct category.id, category.name, card.backimg FROM category, card WHERE card.category_id = category.id');        

        return $results;
    }

    public function show($id)
    {
        $cards = DB::table('card')->where('category_id', '=', $id)->paginate(12);
        return $cards;
    }

    public function name($name)
    {
        $cards = DB::table('card')->where('category', '=', $name)->get();
        return $cards;
    }

}
