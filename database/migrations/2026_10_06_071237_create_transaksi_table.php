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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi',30)->unique();
            $table->foreignId('siswa_id')->constrained('siswa');
            $table->foreignId('jenis_tagihan_id')->constrained('jenis_tagihan');
            $table->foreignId('guru_id')->constrained('guru');
            $table->foreignId('metode_pembayaran_id')->constrained('metode_pembayaran');
            $table->decimal('jumlah_bayar')->nullable();
            $table->date('tanggal_bayar')->nullable();
            $table->text('keterangan');
             $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
