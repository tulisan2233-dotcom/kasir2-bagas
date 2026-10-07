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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis',20)->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L','P']);
            $table->text('alamat')->nullable();
            $table->foreign('kelas_id')->constrained('kelas')->cascadeOnDelete();
            $table->enum('status', ['aktif','nonaktif'])->default('aktif');
            $table->timestamp('created_at',6)->nullable();
            $table->timestamp('update_at',6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
