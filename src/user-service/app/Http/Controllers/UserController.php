<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Junges\Kafka\Facades\Kafka;

class UserController extends Controller
{
    public function getUser(Request $request){
        $producer =  Kafka::publishOn('topic')
        ->withHeaders(['key' => 'value'])
        ->withBodyKey('foo', 'bar');

        $producer->send();
        return response()->json([
            'user' => 2
        ]);
    }
}
