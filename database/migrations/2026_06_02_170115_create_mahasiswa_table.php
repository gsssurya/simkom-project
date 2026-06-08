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
        $table->id();
        $table->unsignedInteger('id_user'); // Dicocokkan dengan id tabel user
        $table->string('nim', 15)->unique();
        $table->string('nama', 100);
        $table->integer('id_program_studi'); 
        $table->integer('semester');

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
