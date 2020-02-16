<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->bigIncrements('chatID');
            $table->bigInteger('userID')->nullable();//If login
            $table->string('name',60)->nullable();
            $table->string('email',120)->nullable();
            $table->bigInteger('adminID')->nullable();//User ID
            $table->string('adminName',60)->nullable();//User Name
            $table->string('status')->default('Pending');//Active / End
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
        Schema::dropIfExists('chat');
    }
}
