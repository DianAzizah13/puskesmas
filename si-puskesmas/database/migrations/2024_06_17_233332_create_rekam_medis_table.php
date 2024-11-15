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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kunjungan');
            $table->foreignId('id_dokter');
            $table->string('keluhan');
            $table->string('diagnosa')->nullable();
            $table->string('anamnesa')->nullable();
            $table->string('berat_badan', 50)->nullable();
            $table->string('tinggi_badan', 50)->nullable();
            $table->string('alergi_obat')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_kunjungan')->references('id')->on('kunjungan')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id')->on('dokter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
