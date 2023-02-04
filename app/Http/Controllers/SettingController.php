<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $sentences = [1];
        return view('setting.index', compact('sentences'));
    }
}
