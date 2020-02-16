<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempOrderReedimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_od_rdm', function (Blueprint $table) {
            $table->bigIncrements('tempRdmOrderID');
            $table->string('sessionID',100);
            $table->bigInteger('productID')->unsigned()->index();
            $table->foreign('productID')->references('productID')->on('products')->onDelete('cascade')->onUpdate('No Action');
            $table->bigInteger('redemptionID')->unsigned()->index();
            $table->foreign('redemptionID')->references('redemptionID')->on('redemption')->onDelete('cascade')->onUpdate('No Action');
            $table->double('qty')->default(0);
            $table->double('points')->default(0);
            $table->unique(array('sessionID', 'productID'));
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
        Schema::dropIfExists('temp_od_rdm');
    }
}
