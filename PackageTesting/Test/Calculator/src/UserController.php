<?php

namespace Test\Calculator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class UserController extends Controller
{
    public function index(Request $request)
    {

        // return "a";

        $data = ['message' => 'Hello from UserController@index'];

        // Return the view with optional data
        return View::make('testing::test', $data);
       
    }
}