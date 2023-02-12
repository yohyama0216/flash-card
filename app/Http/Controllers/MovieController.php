<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private $MovieService = null;

    public function __construct(
        MovieService $MovieService
    )
    {
        $this->MovieService = $MovieService;
    }
    
    public function index(Request $request)
    {
        $movies = $this->MovieService->findAll();
        return view('movie.index', compact('movies'));
    }
}
