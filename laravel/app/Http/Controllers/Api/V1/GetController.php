<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        // echo $user->name;
        return $user->name;
    }
}
