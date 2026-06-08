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
            Schema::create('pendaftaran_anggota', function (Blueprint $table) {
                $table->id();
                $table->integer('id_user');
                $table->integer('id_organisasi');
                $table->string('dokumen_pendukung')->nullable(); // Tetap dibuat nullable/opsional aman
                $table->string('status', 30)->default('menunggu verifikasi');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_anggota');
    }
};
