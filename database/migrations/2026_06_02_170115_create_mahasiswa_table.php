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
    Schema::create('mahasiswa', function (Blueprint $table) {
        $table->id(); // ID mahasiswa tetap bawaan

        // Buat id_user dengan tipe unsignedInteger agar COCOK 100% dengan increments() di tabel user
        $table->unsignedInteger('id_user'); 

        $table->string('nim', 20)->unique();
        $table->string('nama', 100);
        $table->integer('id_program_studi');
        $table->integer('semester');
        $table->timestamps();

        // Deklarasi foreign key manual ke tabel user
        $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
