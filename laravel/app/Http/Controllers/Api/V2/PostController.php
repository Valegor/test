<?php

namespace App\Http\Controllers\Api\V;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {       
    

        $results = DB::table('post')
            ->join('user', 'post.author_id', '=', 'user.id')
            ->join('post_category', 'post.category_id', '=', 'post_category.id')
            ->select('post.id', 'post.title', 'post.subtitle', 'post.body', 
            'post.imgage as img', 'post.updated_at as date',
            'post.author_id', 'user.username as author', 
            'post.category_id', 'post_category.category')
            ->where('post.aviable', 0)
            ->paginate(10);

            // $results = DB::select(

            // 'SELECT 
            //     post.id, post.title, post.subtitle, post.body, 
            //     post.imgage as img, post.updated_at as created,
            //     post.author_id, user.username as author, 
            //     post.category_id, post_category.category 
            // FROM post, user, post_category

            // -- LEFT JOIN post_category ON post.category_id=post_category.id
            // -- LEFT JOIN user ON post.author_id = user.username

            // WHERE post.aviable = 1 
            // and user.id = post.author_id 
            // and post.category_id = post_category.id

            // ');

// SELECT {что-то*} FROM {первая таблица} LEFT JOIN {название второй таблицы} ON {какое-то значение первой таблицы} = {какое-то значение второй таблицы}
        
        
        // $results = DB::select(      
        // 'SELECT 
        //     post.id, post.author_id, post.title, post.subtitle, post.body, 
        //     post.imgage as img, post.updated_at as created, post_category.category
        // FROM 
        //     post, post_category
        // WHERE 
        //     (post.category_id = post_category.id) and
        //     (post.aviable = 1)
        // ');

        // $results = DB::select('SELECT post.id, post.title, post.subtitle, post.body, post.imgage as img, post.updated_at as created, post_category.category  FROM post, post_category WHERE post.category_id = post_category.id');
        // $results = DB::select('SELECT * FROM post, post_category WHERE post.category_id = post_category.id');
        return $results;

        // $post = Post::select('id', 'title', 'subtitle', 'body', 'imgage', 'updated_at')->where('aviable', '=', 1)->get();
        // return PostResource::collection($post);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }


}
