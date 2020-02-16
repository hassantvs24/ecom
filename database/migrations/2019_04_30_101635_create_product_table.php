<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('productID');
            $table->string('sku')->unique();
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->string('notes')->nullable();
            $table->text('description')->nullable();
            $table->string('additional')->nullable();
            $table->integer('review')->default(0);//Number of review
            $table->double('rating')->default(0);//Rating Point
            $table->double('s_commission')->default(5);//SALESMAN COMMISSION (%)
            $table->double('d_commission')->default(2);//DISTRIBUTOR COMMISSION (%)
            $table->double('price')->default(0);
            $table->double('weight')->default(0);
            $table->double('pre_price')->default(0);
            $table->string('img')->default('product.jpg');
            $table->string('img_one')->nullable();
            $table->string('img_two')->nullable();
            $table->string('img_tree')->nullable();
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
        Schema::dropIfExists('products');
    }
}
