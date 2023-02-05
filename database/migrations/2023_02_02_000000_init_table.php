<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

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
         * ユーザー 
         * 
         * */
        // 
        Schema::dropIfExists('users');
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('login_name')->unique();
        //     $table->string('display_name',20);
        //     $table->string('password');
        //     $table->string('permission');
        //     $table->timestamps();
        //     $table->index('display_name');
        // });
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });    

        /** 
         * 例文マスタ 
         * 英文、和文、ジャンル、英単語の数、英文字数、和文字数、追加日
         * */
        Schema::dropIfExists('sentences');
        Schema::create('sentences', function (Blueprint $table) {
            $table->id();
            $table->string('sentence_en',190)->unique();
            $table->string('sentence_jp',190)->unique();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
            $table->index(['created_at','updated_at']);
        });

        /** 
         * 例文学習履歴
         * ID、英文 ID、ユーザー ID、回答
         * 
         * */
        Schema::dropIfExists('sentence_learn_history');
        Schema::create('sentence_learn_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sentence_id')->constrained('sentence');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('answer',['BAD','POOR','GOOD','EXCELLENT']);
            $table->timestamp('studied_at')->useCurrent();
            $table->index('studied_at');
        });

        /** 
         * 例文学習状態
         * ID、英文 ID、ユーザー ID、学習状態、学習回数、学習ポイント、最終学習日
         *  */
        Schema::dropIfExists('sentence_learn_status');
        Schema::create('sentence_learn_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sentence_id')->constrained('sentence');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('status',['D','C','B','A']);
            $table->integer('count');
            $table->timestamp('last_studied_at')->useCurrent();
            $table->timestamp('first_studied_at')->useCurrent();
            $table->index('last_studied_at');
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
