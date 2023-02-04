<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SentenceController extends Controller
{
    public function index(Request $request)
    {
        $data = [1];
        return view('sentence.index', compact('data'));
    }
}
