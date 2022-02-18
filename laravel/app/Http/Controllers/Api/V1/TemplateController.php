<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemplateCategory;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{

    public function show($id)
    {
        $results = DB::table('templates')
        ->join('user', 'templates.author_id', '=', 'user.id')
        ->join('template_category', 'templates.category_id', '=', 'template_category.id')
        ->select('templates.id', 'templates.name', 'templates.subtitle', 'templates.notes',
        'templates.img', 'templates.object', 'templates.updated_at as date',
        'templates.author_id', 'user.username as author', 'user.email as email', 
        'templates.category_id', 'template_category.category')
        ->where('templates.id',  $id)
        ->get();

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
