<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getUser(Request $request){
        for ($i = 0; $i <= 500; $i++){
            Log::error($i);
        }
        return response()->json([
            'user' => 2
        ]);
    }
}
