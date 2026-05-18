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
        // Fields already exist from initial migration
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('akte_bayis', function (Blueprint $table) {
            $table->dropColumn(['nama', 'tanggal_daftar', 'tempat_lahir', 'nama_ayah', 'nama_ibu', 'alamat', 'file']);
        });
    }
};
