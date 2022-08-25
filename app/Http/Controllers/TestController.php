<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('bar');
    }

    public function foo()
    {
        if (!Gate::allows('access-admin')){
            abort('403');
        }
        return view('test.foo');
    }

    public function bar()
    {
        return view('test.bar');
    }
}
