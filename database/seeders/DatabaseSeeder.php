<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->runMovie();
       // $this->runCard();
    }

    private function runMovie()
    {
        DB::table('movies')->truncate();
        DB::table('movies')->insert(
            [
                'url' => 'https://www.youtube.com/watch?v=PeiXWiIvg9s',
                'winners_id' => '8QRCJQ9Y',
                'winners_deck' => '26000042;26000083;28000016;26000046;26000055;26000043;28000015;28000000',
                'losers_id' => '90UV8JRGR',
                'losers_deck' => '28000000;28000008;26000042;26000004;26000046;26000036;26000050;26000005',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }

    private function runCard()
    {
        DB::table('cards')->truncate();
        DB::table('cards')->insert($this->getCharactersInfo());
    }

    /*
     * クラロワAPIからカードの情報を登録
     */

    private function getCharactersInfo() {
        $data = [];
        $sourcePath = "https://raw.githubusercontent.com/RoyaleAPI/cr-api-data/master/docs/json/cards_i18n.json";
        $content = file_get_contents($sourcePath, false);
        $allCard = json_decode($content,true);
        foreach($allCard as $card){
            $index = rtrim($card['sc_key'],"s");
            $data[$index] = [
                'id' => $card['id'],
                'key' => $card['key'],
                'name_jp' => $card['_lang']['name']['jp'],
                'description_jp' => $card['_lang']['description']['jp'],
                'elixir' => $card['elixir'],
                'type' => $card['type'],
                'rarity' => $card['rarity'],
                'arena' => $card['arena'],
            ];
        }
        return $data;
    }
}
