<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('izins', function (Blueprint $table) {
            $table->enum('tujuan_persetujuan', [
                'Ketua Tim',
                'Kepala Subbagian Umum',
                'Kepala BPS Banjar'
            ])
            ->default('Ketua Tim')
            ->change();
        });
    }

    public function down(): void
    {
        Schema::table('izins', function (Blueprint $table) {
            $table->string('tujuan_persetujuan')
                  ->nullable()
                  ->change();
        });
    }
};
