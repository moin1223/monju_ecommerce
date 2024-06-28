<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->float('old_price');
            $table->float('new_price');
            $table->string('weight')->nullable();
            $table->string('stock');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('review_1')->nullable();
            $table->string('review_2')->nullable();
            $table->string('review_3')->nullable();
            $table->string('cartificate_1')->nullable();
            $table->string('cartificate_2')->nullable();
            $table->string('cartificate_3')->nullable();
 
       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
