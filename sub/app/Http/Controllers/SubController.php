<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SubController extends Controller
{
    public function subscribe(Request $request,$topic)
    {
        Redis::subscribe(['new_message'], function ($data) {
            return response()->json([
                'topic' => $topic,
                'data' => $data,
            ]);
        });
        return response()->json([
            'topic' => $topic,
            'url' => $request->url,
        ]);
    }
}
