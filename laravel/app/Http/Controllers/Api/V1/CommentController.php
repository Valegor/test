<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemplateComment;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;

// use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{

    public function commentsList($id)
    {
        $results = DB::table('template_comment')
        ->where('template_id',  $id)
        ->where('aviable',  '1')
        ->get();

        return $results;
    }

    public function store(StoreCommentRequest $request)
    {

        $check = DB::table('template_comment')
        ->select('id')
        ->where('template_id', '=', $request->template_id)
        ->where('author_email', '=', $request->author_email)
        ->where('aviable', '=', '0')
        ->first();

        if(!$check){

        $data = $request->all();

        $answer = TemplateComment::create($data);

        return new CommentResource($answer);

        } else {

            return 'Comment wait moderation';

        }
    }

    // public function destroy($id)
    // {
    //     $result = DB::delete('delete from template_comment where id = ?',[$id]);

    //     return $result;

    // }

    // public function update(StoreCommentRequest $request)
    // {
    //     $result = DB::table('template_comment')
    //     ->where('id', '=', $request->id)
    //     ->where('aviable', '=', '0')
    //     ->update([
    //         'parent_id' => $request->parent_id,
    //         'text' => $request->text,
    //         'template_id' => $request->template_id,
    //         'author_id' => $request->author_id,
    //         'author_name' => $request->author_name,
    //         'author_email' => $request->author_email,
    //         'aviable' => $request->aviable,          
    //         // 'created_at' => $request->created_at,
    //         // 'updated_at' => $request->updated_at
    // ]);
    //     return $result;
    // }

}