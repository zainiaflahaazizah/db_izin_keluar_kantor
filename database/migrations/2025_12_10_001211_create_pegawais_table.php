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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('nip_bps')->nullable();
            $table->enum('jabatan', ['Anggota', 'Ketua Tim', 'Kepala Subbagian Umum', 'Kepala BPS']);
            $table->string('wilayah');
            $table->string('status');
            $table->string('pendidikan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
