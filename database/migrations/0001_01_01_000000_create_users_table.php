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
    Schema::create('user', function (Blueprint $table) {
        $table->increments('id'); // Berupa INT AUTO_INCREMENT sesuai SQL dump Anda
        $table->string('email', 100)->unique();
        $table->string('no_telepon', 15)->nullable();
        $table->string('password', 255);
        $table->enum('role', ['mahasiswa', 'pengurus', 'bendahara', 'admin', 'pembina'])->default('mahasiswa');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
