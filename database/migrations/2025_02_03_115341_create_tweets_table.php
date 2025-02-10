<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/** このクラスは、tweetsテーブルを作成するためのマイグレーションを定義します。 
 * マイグレーションとは、データベースのスキーマ（構造）をバージョン管理するための仕組みです。
 * Laravelでは、マイグレーションを使用してデータベースのテーブルやカラムの追加、変更、削除を簡単に行うことができます。
 * upメソッドは、tweetsテーブルを作成するためのマイグレーションを実行します。
 * downメソッドは、tweetsテーブルを削除するためのマイグレーションをロールバックします。
 * 
 * @package Database\Migrations
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeonDelete();
            $table->string('tweet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweets');
    }
};
