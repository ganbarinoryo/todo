<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('todos', function (Blueprint $table) {
      $table->id();
      //外部キーを設定　laravel規約に則り、自動でテーブルを紐付ける　参照先idが削除されたら、その外部idを持つレコードも削除する↓
      $table->foreignId('category_id')->constrained()->cascadeOnDelete();
      $table->string('content', 20);
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
    Schema::dropIfExists('todos');
  }
}