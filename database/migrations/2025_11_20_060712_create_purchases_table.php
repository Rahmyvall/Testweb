<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->integer('qty')->unsigned();
            $table->decimal('total_price', 15, 2); // presisi untuk harga
            $table->string('buyer_name');
            $table->enum('status', ['active', 'cancelled'])->default('active');
            $table->text('note')->nullable();
            $table->timestamps(); // otomatis membuat created_at dan updated_at
            $table->timestamp('cancelled_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};