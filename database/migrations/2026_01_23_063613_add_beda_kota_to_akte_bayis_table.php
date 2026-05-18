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
        Schema::table('akte_bayis', function (Blueprint $table) {
            $table->boolean('beda_kota')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('akte_bayis', function (Blueprint $table) {
            $table->dropColumn('beda_kota');
        });
    }
};
