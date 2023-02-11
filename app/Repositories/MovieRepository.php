<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieRepository
{    
    private CONST PEKKA_BATTLE_RAM_IDS = [
        '26000004','26000036'
    ];
    
    public function findAll()
    {
        return Movie::all();
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
        
        $winConditions = [];
        $loseConditions = [];
        foreach($cardIdList as $cardId) {
            $winConditions[] = ['winners_deck', 'like','%'.$cardId.'%'];
            $loseConditions[] = ['losers_deck', 'like','%'.$cardId.'%'];
        }
        
        if ($type == 'win') {
            return Movie::where($winConditions)->get(); 
        } else if ($type == 'lose') {
            return Movie::where($loseConditions)->get(); 
        } else {
            return Movie::where($winConditions)
            ->orWhere($loseConditions)->get();  
        }
    }
}
