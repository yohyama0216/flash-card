<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Card;

class Battle extends Model
{
    use HasFactory;
 
    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function decks(): HasMany
    {
        return $this->hasMany(Deck::class);
    }
}
