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
        Schema::create('izins', function (Blueprint $table) {
            $table->id('id_izin');
            $table->unsignedBigInteger('id_pegawai');
            $table->string('alasan');
            $table->time('jam_keluar');
            $table->time('jam_kembali')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('tujuan_persetujuan');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->timestamps();

            //foreign key
            $table->foreign('id_pegawai')
                  ->references('id_pegawai')
                  ->on('pegawais')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izins');
    }
};
