<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('verified')->default(false);
            $table->string('contact',30)->nullable();
            $table->string('address',160)->nullable();
            $table->string('state',80)->nullable();
            $table->string('city',80)->nullable();
            $table->string('postCode',30)->nullable();
            $table->string('country',100)->nullable();
            $table->double('points')->default(0);
            $table->string('img')->default('customer.jpg');
            $table->string('isAdmin', 3)->default('NO');
            $table->string('userLevel', 15)->default('Customer');//Customer / Salesman / Distributor
            $table->integer('ref')->nullable();
            $table->integer('distributor')->nullable();
            $table->integer('salesman')->nullable();
            $table->bigInteger('locationID')->nullable();
            $table->integer('roleID')->nullable();
            $table->string('status')->default('Active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
