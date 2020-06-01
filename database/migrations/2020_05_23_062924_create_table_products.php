<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class   CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");//thêm table
            $table->text("product_desc");//thêm table
            $table->decimal("price",12,4);//thêm table
            $table->unsignedBigInteger("qty")->default(1);//thêm table
            $table->unsignedBigInteger("category_id");//thêm table
            $table->unsignedBigInteger("brand_id");//thêm table
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("categories");//thêm table
            $table->foreign("brand_id")->references("id")->on("brands");//thêm table
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
