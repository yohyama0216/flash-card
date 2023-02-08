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
        // $this->runUser();
        $this->runMovie();


    }

    private function runUser()
    {
        \App\Models\User::factory(10)->create();
    }

    private function runMovie()
    {
        DB::table('movies')->truncate();
        DB::table('movies')->insert(
            [
                'url' => 'https://www.youtube.com/watch?v=PeiXWiIvg9s',
                'winners_id' => '8QRCJQ9Y',
                'winners_deck' => '26000042%3B26000083%3B28000016%3B26000046%3B26000055%3B26000043%3B28000015%3B28000000',
                'losers_id' => '90UV8JRGR',
                'losers_deck' => '28000000%3B28000008%3B26000042%3B26000004%3B26000046%3B26000036%3B26000050%3B26000005',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
