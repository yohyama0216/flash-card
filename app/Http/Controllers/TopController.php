<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index(Request $request)
    {
        $data = [1];
        return view('top.index', compact('data'));
    }
}
