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
        Schema::create('delivery', function (Blueprint $table) {
            $table->id('delivery_id');
            $table->foreignId('order_id')->constrained('orders', 'order_id');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('status'); // pending, shipped, delivered
            $table->dateTime('shipped_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery');
    }
};
