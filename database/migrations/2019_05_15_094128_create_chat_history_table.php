<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_history', function (Blueprint $table) {
            $table->bigIncrements('chatHistoryID');
            $table->bigInteger('chatID')->unsigned()->index();
            $table->foreign('chatID')->references('chatID')->on('chat')->onDelete('cascade')->onUpdate('No Action');
            $table->text('message');
            $table->string('name', 60);
            $table->string('fromType', 10)->default('Customer');//get message from Customer or Admin
            $table->softDeletes();
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
        Schema::dropIfExists('chat_history');
    }
}
