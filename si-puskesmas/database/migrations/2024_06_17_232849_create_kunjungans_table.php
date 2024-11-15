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
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien');
            $table->foreignId('id_poli');
            $table->foreignId('id_waktu');
            $table->date('tanggal_kunjungan');
            $table->string('kode_kunjungan', 20);
            $table->enum('status', ['Aktif', 'Selesai']);
            $table->timestamps();

            $table->foreign('id_pasien')->references('id')->on('pasien')->onDelete('cascade');
            $table->foreign('id_poli')->references('id')->on('poli')->onDelete('cascade');
            $table->foreign('id_waktu')->references('id')->on('waktu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
