<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostCategoryResource;
use App\Models\PostCategory;
use Illuminate\Support\Facades\DB;

class PostCategoryController extends Controller
{
    public function index()
    {
        $category = PostCategory::select('id', 'category', 'img')->get();
        return PostCategoryResource::collection($category);
    }

    public function show($id)
    {
        $results = DB::table('post')
        ->join('user', 'post.author_id', '=', 'user.id')
        ->join('post_category', 'post.category_id', '=', 'post_category.id')
        ->select('post.id', 'post.title', 'post.subtitle', 'post.body', 
        'post.imgage as img', 'post.updated_at as date',
        'post.author_id', 'user.username as author', 
        'post.category_id', 'post_category.category')
        ->where('post.category_id',  $id)
        ->where('post.aviable',  1)
        ->orderBy('post.updated_at', 'desc')
        ->paginate(10);

        return $results;
    }

    // public function posts($category_id)
    // {
    //     $results = DB::select('select * from post where category_id = ?', [$category_id]);
    //     return $results;

    //     // $post = Post::select('id', 'title', 'subtitle', 'body', 'imgage', 'updated_at')->where('aviable', '=', 1)->get();
    //     // $relatedPost = DB::category('post')
    //     // ->join('post', 'post.category_id', '=', 'post_category.user_id')->get();
    // }
}
