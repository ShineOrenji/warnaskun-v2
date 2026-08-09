<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_histories', function (Blueprint $table) {
            $table->text('address')->nullable()->after('delivery_type');
            $table->string('landmark')->nullable()->after('address');
            $table->text('note')->nullable()->after('landmark');
        });
    }

    public function down(): void
    {
        Schema::table('order_histories', function (Blueprint $table) {
            $table->dropColumn(['address', 'landmark', 'note']);
        });
    }
};