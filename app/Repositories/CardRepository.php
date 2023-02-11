<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Card;

class CardRepository
{        
    public function findAll()
    {
        return Card::all();
    }

    public function findById($id)
    {
        return Card::find($id);
    }

    public function findByType($type)
    {
        return Card::where('type','=',$type)->get();
    }
}
