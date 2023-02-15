<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Card;

class Movie extends Model
{
    use HasFactory;

    // 以下、全部Deckクラスな気もするが。TODO
    private CONST DECK_COPY_BASE_URL = 'https://link.clashroyale.com/deck/jp?deck={deck}';
    
    public function getCardsFromDeck($type)
    {
        $deck = [];
        if ($type == 'win') {
            $deck = $this->winners_deck;
        } else if ($type == 'lose') {
            $deck = $this->losers_deck;
        }
        
        $cardIdList = explode(';',$deck);
        $list = [];
        foreach($cardIdList as $cardId) {
            $Card = Card::find($cardId);
            $list[$cardId] = $Card->key;
        }
        return $list;
    }

    public function getDeckCopyUrl($type)
    {
        $deck = [];
        if ($type == 'win') {
            $deck = $this->winners_deck;
        } else if ($type == 'lose') {
            $deck = $this->losers_deck;
        }
        return str_replace('{deck}',$deck,self::DECK_COPY_BASE_URL);
    }
}
