<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_histories', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('phone');
            $table->string('delivery_type')->nullable();
            $table->integer('total');
            
            // Kolom ini untuk menyimpan detail menu apa saja yang dibeli (format JSON)
            $table->json('items_detail')->nullable(); 
            
            // Menyimpan tanggal asli pesanan dibuat
            $table->timestamp('order_created_at')->nullable(); 
            
            // timestamps bawaan laravel (untuk tahu kapan pesanan ini selesai/masuk riwayat)
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_histories');
    }
};