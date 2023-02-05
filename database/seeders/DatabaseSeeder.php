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
        $this->runUser();
        $this->runSentences();


    }

    private function runUser()
    {
        \App\Models\User::factory(10)->create();
    }

    private function runSentences()
    {
        DB::table('sentences')->truncate();
        //C:\Users\acroadmin\Documents\flash-card\database\seeders\senteces.csv
        $filePath = base_path('database\seeders\sentences2.csv');
        $fp = fopen($filePath, 'r');
        $now = (new DateTime())->format('Y-m-d h:i:s');
        $sentences = [];
        $count = 1;

         // 英文の重複削除
        $tmp = [];
        while($data = fgetcsv($fp)){
            $key = $data[0];
            $tmp[$key] = [
                'sentence_en' => $data[0],
                'sentence_jp' => $data[1],
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        fclose($fp);

        // 和文の重複削除
        $sentences = [];
        foreach($tmp as $sentence) {
            $key = $sentence['sentence_jp'];
            $sentences[$key] = $sentence;
        }


        $fp = fopen(base_path('database\seeders\sentences2.csv'), 'w');
        foreach($sentences as $sentence) {
            fputcsv($fp, [$sentence['sentence_en'],$sentence['sentence_jp']]);
        }
        fclose($fp);

        foreach($sentences as $sentence) {
            $sentence['id'] = $count;
            DB::table('sentences')->insert($sentence);
            $count++;
        }

    }
}
