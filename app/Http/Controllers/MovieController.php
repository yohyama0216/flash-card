<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::all();
        return view('movie.index', compact('movies'));
    }
}
