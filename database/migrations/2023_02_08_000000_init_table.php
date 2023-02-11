<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** 
         * 動画 
         * 
         */
        Schema::dropIfExists('movies');
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('winners_id');
            $table->string('winners_name');
            $table->string('winners_deck');
            $table->string('losers_id');
            $table->string('losers_name');
            $table->string('losers_deck');
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });

        /**
         * カードマスタ
         */
        Schema::create('cards', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('key');
            $table->string('name_jp');
            $table->tinyInteger('elixir');
            $table->string('type');
            $table->string('rarity');
            $table->tinyInteger('arena');
            $table->string('description_jp');
            $table->string('file_name');
            // $table->integer('sight_range');
            // $table->integer('speed');
            // $table->integer('hit_speed');
            // $table->string('hitpoints_per_level');
            // $table->string('damage_per_level');
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
