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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderSku')->unique()->index();
            $table->string('offerSku');
            $table->foreign('offerSku')
                ->references('offerSku')
                ->on('offers')
                ->onDelete('cascade');

            $table->integer('quantity')->default(0);
            $table->dateTime('orderDate')->default(now());
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
