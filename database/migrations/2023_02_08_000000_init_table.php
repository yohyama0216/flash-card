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
            $table->string('winners_deck');
            $table->string('losers_id');
            $table->string('losers_deck');
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
