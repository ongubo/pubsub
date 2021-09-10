<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class PubController extends Controller
{
    public function topic(Request $request,$topic)
    {
        Redis::publish('new_message', json_encode([
            'data' => $request->all(),
        ]));
        return response()->json([
            'topic' => $topic,
        ]);
    }
}
