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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offerSku')->unique()->index();
            $table->string('productSku');
            $table->foreign('productSku')
                ->references('productSku')
                ->on('products')
                ->onDelete('cascade');

            $table->string('sellerSku');
            $table->decimal('price', 10, 2);
            $table->string('condition');
            $table->string('availability');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
