<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payment_methods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('payment_method_id')->unsigned();
            $table->foreign('payment_method_id')->references('id')->on('primary_payment_methods')->onDelete('restrict')->onUpdate('cascade');

            $table->string('payment_method_title', 100)->nullable();
            $table->string('payment_method_no', 100)->nullable();
            $table->string('payment_method_details', 100)->nullable();
            $table->integer('isPreferred')->default(0);
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
        Schema::dropIfExists('user_payment_methods');
    }
}
