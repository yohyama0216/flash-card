<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sentence;

class SentenceController extends Controller
{
    public function index(Request $request)
    {
        $sentences = Sentence::all();
        return view('sentence.index', compact('sentences'));
    }
}
