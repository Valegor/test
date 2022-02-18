<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostCategoryResource;
use App\Models\PostCategory;
use Illuminate\Support\Facades\DB;

class PostCategoryController extends Controller
{
    public function index()
    {
        $category = PostCategory::select('id', 'category')->get();
        return PostCategoryResource::collection($category);
    }

    public function show(PostCategory $category)
    {
        return new PostCategoryResource($category);
    }

    public function posts($category_id)
    {
        $results = DB::select('select * from post where category_id = ?', [$category_id]);
        return $results;

        // $post = Post::select('id', 'title', 'subtitle', 'body', 'imgage', 'updated_at')->where('aviable', '=', 1)->get();
        // $relatedPost = DB::category('post')
        // ->join('post', 'post.category_id', '=', 'post_category.user_id')->get();
    }
}
