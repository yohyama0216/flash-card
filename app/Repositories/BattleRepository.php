<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Battle;
use App\Models\Deck;
use Illuminate\Support\Facades\DB;
use lluminate\Database\Eloquent\Builder;

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
                
        // $query = $this->Battle->find(1)->decks()->where('id', '=', '1')->get();
        $query = $this->Battle->all();
        // デッキを探す例
        // $query = Deck::whereRelation('cards', 'cards.id', '28000015')->get();
        return $query;
    }
}
