<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission', function (Blueprint $table) {
            $table->bigIncrements('commissionID');
            $table->double('percents')->default(0);
            $table->double('amount')->default(0);
            $table->bigInteger('orderID')->unsigned()->index();
            $table->foreign('orderID')->references('orderID')->on('orders')->onDelete('cascade')->onUpdate('No Action');
            $table->bigInteger('productID')->unsigned()->index();
            $table->foreign('productID')->references('productID')->on('products')->onDelete('No Action')->onUpdate('No Action');
            $table->string('sku')->nullable();
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->double('price')->default(0);
            $table->string('img')->default('product.jpg');
            $table->bigInteger('userID')->unsigned()->index();
            $table->foreign('userID')->references('id')->on('users')->onDelete('No Action')->onUpdate('No Action');
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
        Schema::dropIfExists('commission');
    }
}
