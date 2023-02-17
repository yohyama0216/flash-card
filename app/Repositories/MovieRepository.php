<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieRepository
{    
    private $Movie;    
    private CONST PEKKA_BATTLE_RAM_IDS = [
        '26000004','26000036'
    ];
    
    public function __construct(
        Movie $Movie
    )
    {
        $this->Movie = $Movie;
    }

    public function findAll()
    {
        return $this->Movie::all();
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

        $win_conditions = $lose_conditions = [];
        foreach($cardIdList as $cardId) {
            $win_conditions[] = ['winner_deck', 'like','%'.$cardId.'%'];
            $lose_conditions[] = ['loser_deck', 'like','%'.$cardId.'%'];
        }

        $query = $this->Movie::leftJoin('players as winner', function($join){
            $join->on('movies.id', '=', 'winner.movie_id',)
                ->where('winner.result', '=', 1);
            })
            ->join('players as loser', function($join){
                $join->on('movies.id', '=', 'loser.movie_id',)
                    ->where('loser.result', '=', 0);
            })
            ->select('movies.id as movie_id','movies.url as movie_url','winner.deck as winner_deck','loser.deck as loser_deck');

        if ($type == 'winner') {
            $query = $query->where($win_conditions);
        } else if ($type == 'loser') {
            $query = $query->where($lose_conditions);
        } else {
            $query = $query->where($win_conditions)
            ->orWhere($lose_conditions);
        }
        return $query->limit(10)->get();
    }
}
