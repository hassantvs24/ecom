<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderReedimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_rdmp_item', function (Blueprint $table) {
            $table->bigIncrements('orderRdmItemID');
            $table->bigInteger('orderID')->unsigned()->index();
            $table->foreign('orderID')->references('orderID')->on('orders')->onDelete('cascade')->onUpdate('No Action');
            $table->bigInteger('productID')->unsigned()->index();
            $table->foreign('productID')->references('productID')->on('products')->onDelete('No Action')->onUpdate('No Action');
            $table->string('sku')->nullable();
            $table->string('name')->nullable();
            $table->double('point')->default(0);
            $table->double('qty')->default(0);
            $table->string('img')->default('product.jpg');
            $table->unique(array('orderID', 'productID'));
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
        Schema::dropIfExists('order_rdmp_item');
    }
}
