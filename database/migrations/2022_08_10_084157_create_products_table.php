<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('brand_id');
            $table->string('category_id');
            $table->string('subcategory_id');
            $table->string('unique_id');
            $table->string('product_name');
            $table->longText('page_title')->nullable();
            $table->longText('page_description')->nullable();
            $table->longText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('product_description');
            $table->string('product_thambnail');
            $table->string('product_thambnail_alt')->nullable();
            $table->longText('slug');
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
};
