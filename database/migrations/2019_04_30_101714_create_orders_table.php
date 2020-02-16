<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('orderID');
            $table->string('orderNumber')->nullable();
            $table->string('payslip')->nullable();
            $table->string('notes')->nullable();
            $table->bigInteger('userID')->unsigned()->index();
            $table->foreign('userID')->references('id')->on('users')->onDelete('No Action')->onUpdate('No Action');
            $table->string('status',20)->default('Confirm');
            $table->string('trackNumber',100)->nullable();
            $table->bigInteger('shippingID')->nullable();
            $table->double('shipCost')->default(0);
            //$table->foreign('shippingID')->references('shippingID')->on('shipping')->onDelete('No Action')->onUpdate('No Action');
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
        Schema::dropIfExists('orders');
    }
}
