<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Card;

class Battle extends Model
{
    use HasFactory;

    // 以下、全部Deckクラスな気もするが。TODO
    private CONST DECK_COPY_BASE_URL = 'https://link.clashroyale.com/deck/jp?deck={deck}';
    
    public function getCardKeyListFromDeck($player)
    {        
        $players_deck = $player."_deck";
        $cardIdList = explode(';',$this->$players_deck);
        $cardKeylist = [];
        foreach($cardIdList as $cardId) {           
            $Card = Card::find($cardId);
            //$cardKeylist[$cardId] = $Card->key;
        }
        return $cardKeylist;
    }

    public function getDeckCopyUrl($player)
    {
        $players_deck = $player."_deck";
        return str_replace('{deck}',$this->$players_deck,self::DECK_COPY_BASE_URL);
    }

    public function testing()
    {
        var_dump($this->winners_deck);
    }
}
