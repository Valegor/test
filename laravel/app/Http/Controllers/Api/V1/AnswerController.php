<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemplateAnswer;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\StorePassportRequest;
use App\Http\Requests\StoreObjectRequest;
use App\Http\Requests\AnswerCheckRequest;
use App\Http\Resources\AnswerResource;

// use Symfony\Component\HttpFoundation\Response;

class AnswerController extends Controller
{

    public function answersList($id)
    {
        $results = DB::table('template_answer')
        ->select('template_answer.id', 'template_answer.title', 'template_answer.subtitle', 
        'template_answer.author_name', 'template_answer.updated_at')
        ->where('template_answer.template_id',  $id)
        ->where('template_answer.aviable', '1')
        ->orderBy('template_answer.updated_at', 'desc')
        ->paginate(10);

        return $results;
    }

    public function store(StoreAnswerRequest $request)
    {
        $data = $request->all();

        $answer = TemplateAnswer::create($data);

        return new AnswerResource($answer);
    }
    
    
    public function show($id)
    {
        $results = DB::table('template_answer')
        ->join('templates', 'template_answer.template_id', '=', 'templates.id')
        ->select('template_answer.id', 'template_answer.title', 'template_answer.subtitle', 
        'template_answer.object', 'template_answer.updated_at as date',
        'template_answer.author_id', 'template_answer.author_name as author', 'template_answer.author_email as email', 
        'template_answer.template_id','template_answer.notes', 'templates.name as template_name')
        ->where('template_answer.id',  $id)
        ->get();

        return $results;
    }

    public function check(AnswerCheckRequest $request)
    {
        $data = DB::table('template_answer')
        ->select('id')
        ->where('template_id', '=', $request->template_id)
        ->where('author_email', '=', $request->author_email)
        ->where('aviable', '=', '0')
        ->first();

        if($data){

        $result = $data->id;

        return $result; 

        } else {

            return 0;

        }

    }

    // public function check(AnswerCheckRequest $request)
    // {
    //     $result = DB::table('template_answer')
    //     ->where('template_id', '=', $request->template_id)
    //     ->where('author_email', '=', $request->author_email)
    //     ->where('aviable', '=', '0')
    //     ->count();

    //     return $result; 

    // }


    public function update(StoreAnswerRequest $request)
    {
        $result = DB::table('template_answer')
        ->where('id', '=', $request->id)
        ->where('aviable', '=', '0')
        ->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'template_id' => $request->template_id,
            'author_id' => $request->author_id,
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'aviable' => $request->aviable,
            'object' => $request->object,
    ]);
        return $result;
    }

    public function updateObject(StoreObjectRequest $request)
    {
        $result = DB::table('template_answer')
        ->where('id', '=', $request->id)
        ->where('aviable', '=', '0')
        ->update([
            // 'title' => $request->title,
            // 'subtitle' => $request->subtitle,
            // 'template_id' => $request->template_id,
            // 'author_id' => $request->author_id,
            // 'author_name' => $request->author_name,
            // 'author_email' => $request->author_email,
            // 'aviable' => $request->aviable,
            'object' => $request->object,
    ]);
        return $result;
    }

    public function updatePassport(StorePassportRequest $request)
    {
        $result = DB::table('template_answer')
        ->where('id', '=', $request->id)
        ->where('aviable', '=', '0')
        ->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'notes' => $request->notes,
            // 'template_id' => $request->template_id,
            // 'author_id' => $request->author_id,
            // 'author_name' => $request->author_name,
            // 'author_email' => $request->author_email,
            // 'aviable' => $request->aviable,
            // 'object' => $request->object,
    ]);
        return $result;
    }

    public function answerEmail($email)
    {
        $results = DB::table('template_answer')
        ->select('template_answer.id', 'template_answer.title', 'template_answer.subtitle')
        ->where('template_answer.author_email',  $email)
        ->where('template_answer.aviable', '0')
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