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
        // 初めからすべてのカラムを定義しておく
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            // 参照先のテーブル(users)を指定する
            $table->foreignId('follower_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('followee_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
};
