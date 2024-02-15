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
            $table->string('name');
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->text('brand')->nullable();
            $table->text('color')->nullable();
            $table->text('size')->nullable();
            $table->string('images')->nullable();
            $table->float('price',8,2);
            $table->float('sale_price',8,2)->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('subcategory_id')->constrained('subcategories');
            $table->boolean('is_active')->default(0);
            $table->boolean('sale')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
