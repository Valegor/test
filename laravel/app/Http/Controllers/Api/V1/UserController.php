<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Score;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index($email)
    {       
        
        $results = DB::table('users')
            ->select('id', 'name', 'email', 'score')
            ->where('email', $email)
            ->get();

            return $results;

    }
        
}