<?php

namespace HelloWorld;

use Illuminate\Http\Request;

class Hello
{
    public function index()
    {
        // Your logic here to fetch data or perform actions
        return response()->json(['message' => 'Hello from Hello@index']);
    }
}
