<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Battle;

class BattleRepository
{    
    private $Battle;    
    private CONST PEKKA_BATTLE_RAM_IDS = [
        '26000004','26000036'
    ];
    
    public function __construct(
        Battle $Battle
    )
    {
        $this->Battle = $Battle;
    }

    public function findAll()
    {
        return $this->Battle::all();
    }

    /**
     * カードIDで検索。何も指定しない場合はペッカ攻城のデッキが出る
     * （基本的にはペッカ攻城のデータしか無いが、念のため。
     */
    public function findByCardIdList($cardIdList,$type='')
    {
        if (empty($cardIdList)) {
            $cardIdList = self::PEKKA_BATTLE_RAM_IDS;
        }

        // $win_conditions = $lose_conditions = [];
        // foreach($cardIdList as $cardId) {
        //     $win_conditions[] = ['winner_deck', 'like','%'.$cardId.'%'];
        //     $lose_conditions[] = ['loser_deck', 'like','%'.$cardId.'%'];
        // }

        $query = $this->Battle::leftJoin('players as winner', function($join){
            $join->on('battles.id', '=', 'winner.battle_id',)
                ->where('winner.result', '=', 1);
            })
            ->join('players as loser', function($join){
                $join->on('battles.id', '=', 'loser.battle_id',)
                    ->where('loser.result', '=', 0);
            })
            ->join('deck_player as deck_winner', 'winner.id', '=', 'deck_winner.player_id')
            ->join('deck_player as deck_loser', 'loser.id', '=', 'deck_loser.player_id')
            ->join('decks as win_deck', 'win_deck.id', '=', 'deck_winner.deck_id')
            ->join('decks as lose_deck', 'lose_deck.id', '=', 'deck_loser.deck_id')

            ->select('battles.id as battle_id','battles.url as battle_url','win_deck.id','lose_deck.id');

        // if ($type == 'winner') {
        //     $query = $query->where($win_conditions);
        // } else if ($type == 'loser') {
        //     $query = $query->where($lose_conditions);
        // } else {
        //     $query = $query->where($win_conditions)
        //     ->orWhere($lose_conditions);
        // }
        return $query->limit(10)->get();
    }
}
