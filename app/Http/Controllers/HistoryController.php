<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\Models\Algorhythm;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $data = [1];
        return view('history.index', compact('data'));
    }
}
