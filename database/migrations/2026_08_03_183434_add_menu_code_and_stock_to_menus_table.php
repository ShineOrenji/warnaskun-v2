<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {

            $table->string('menu_code',20)
                  ->unique()
                  ->after('id');

            $table->integer('stock')
                  ->default(0)
                  ->after('price');

        });
    }

    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {

            $table->dropColumn('menu_code');

            $table->dropColumn('stock');

        });
    }
};