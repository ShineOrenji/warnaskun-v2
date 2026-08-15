<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable()->after('id');
        $table->string('payment_method')->default('tunai')->after('total'); // 'tunai' atau 'qris'
        $table->string('payment_status')->default('pending')->after('payment_method'); // 'pending', 'paid', 'expired', 'cancelled'
        $table->string('snap_token')->nullable()->after('payment_status'); // Token dari payment gateway nantinya
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
