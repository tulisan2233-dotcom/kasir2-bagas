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
        Schema::create('jenis_tagihan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tagihan',20)->unique();
            $table->string('nama_tagihan')->nullable();
            $table->decimal('nominal')->nullable();
            $table->string('periode')->nullable();
            $table->text('keterangan');
            $table->enum('status', ['aktif','nonaktif'])->default('aktif');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_tagihan');
    }
};
