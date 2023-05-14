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
            $table->enum('order_type', ['dine-in', 'delivery', 'takeaway']);
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->integer('table_number')->nullable();
            $table->string('waiter_name')->nullable();
            $table->double('service_charge')->nullable();
            $table->double('delivery_fees')->nullable();
            $table->timestamps();
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
