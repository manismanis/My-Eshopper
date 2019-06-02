<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('itemname')->unique();;
            $table->integer('price');
            $table->string('image');
            $table->boolean('status')->default(0);
            $table->boolean('isFeatured')->default(0);
            $table->boolean('isRecommended')->default(0);
            $table->unsignedBigInteger('subcat_id')->unsigned();
            $table->unsignedBigInteger('brand_id')->unsigned();
            $table->foreign('subcat_id')->references('subcat_id')->on('subcategories')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('items');
    }
}
