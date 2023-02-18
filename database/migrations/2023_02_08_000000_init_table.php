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
         * 対戦動画 
         */
        Schema::dropIfExists('battles');
        Schema::create('battles', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });

        /** 
         * 対戦プレイヤー
         */
        Schema::dropIfExists('players');
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('cr_id');
            $table->string('battle_id');
            $table->foreign('battle_id')->references('id')->on('battles')->cascadeOnUpdate()->cascadeOnDelete();
            // $table->string('name');
            $table->string('deck');
            $table->tinyInteger('result'); // Enum？ win or lose
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });

        /**
         * カードマスタ
         */
        Schema::dropIfExists('cards');
        Schema::create('cards', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('key');
            $table->string('name_jp');
            $table->tinyInteger('elixir');
            $table->string('type');
            $table->string('rarity');
            $table->tinyInteger('arena');
            $table->string('description_jp');
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
