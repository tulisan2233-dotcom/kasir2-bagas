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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas',50);
            $table->foreignId('jenjang_id')->constrained('jenjang')->cascadeOnDelete();
            $table->foreignId('jurusan_id')->constrained('jurusan')->cascadeOnDelete();
            $table->enum('status', ['aktif','nonaktif'])->default('aktif');
            $table->timestamp('created_at',6)->nullable();
            $table->timestamp('update_at',6)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
