<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('client');
            $table->string('product');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('total_price');
            $table->string('sale_date');

            $table->unsignedBigInteger('client_id');          
            $table->foreign('client_id')->references('id')->on('clients');

            $table->unsignedBigInteger('product_id');          
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
