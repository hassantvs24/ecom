<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedemptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redemption', function (Blueprint $table) {
            $table->bigIncrements('redemptionID');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('img')->default('promotion.jpg');
            $table->dateTime('starts')->nullable();
            $table->dateTime('ends')->nullable();
            $table->string('status', 20)->default('Active');
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
        Schema::dropIfExists('redemption');
    }
}
