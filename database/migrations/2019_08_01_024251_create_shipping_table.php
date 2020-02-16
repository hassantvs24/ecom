<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {
            $table->bigIncrements('shippingID');
            $table->bigInteger('carrierID')->unsigned()->index();
            $table->foreign('carrierID')->references('carrierID')->on('carrier')->onDelete('CASCADE')->onUpdate('No Action');
            $table->bigInteger('locationID')->unsigned()->index();
            $table->foreign('locationID')->references('locationID')->on('location')->onDelete('CASCADE')->onUpdate('No Action');
            $table->double('weight')->default(0);
            $table->double('weight_add')->default(0);
            $table->double('rate')->default(0);
            $table->double('rate_add')->default(0);
            $table->integer('shipping_time')->default(0);
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
        Schema::dropIfExists('shipping');
    }
}
