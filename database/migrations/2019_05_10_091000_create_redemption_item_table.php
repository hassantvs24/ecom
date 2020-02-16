<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedemptionItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redemption_item', function (Blueprint $table) {
            $table->bigIncrements('redemptionItemID');
            $table->bigInteger('productID')->unsigned()->index();
            $table->foreign('productID')->references('productID')->on('products')->onDelete('cascade')->onUpdate('No Action');
            $table->bigInteger('redemptionID')->unsigned()->index();
            $table->foreign('redemptionID')->references('redemptionID')->on('redemption')->onDelete('cascade')->onUpdate('No Action');
            $table->double('point')->default(0);
            $table->unique(array('productID', 'redemptionID'));
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
        Schema::dropIfExists('redemption_item');
    }
}
