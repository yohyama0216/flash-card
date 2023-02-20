<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Deck extends Model
{
    use HasFactory;

    private CONST DECK_COPY_BASE_URL = 'https://link.clashroyale.com/deck/jp?deck={deck}';    

    public function cards(): BelongsToMany
    {
        return $this->belongsToMany(Card::class);
    }

    public function battles(): BelongsToMany
    {
        return $this->belongsToMany(Battle::class);
    }

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class);
    }

    public function createCopyUrl()
    {
        $deck = [];
        foreach($this->cards as $card) {
            $deck[] = $card->id;
        }
        $str = implode(';',$deck);
        return str_replace('{deck}',$str,self::DECK_COPY_BASE_URL);
    }

    public function calcAverageElixir()
    {
        $deck = [];
        foreach($this->cards as $card) {
            $deck[] = $card->elixir;
        }
        return array_sum($deck) / count($deck);
    }
}
