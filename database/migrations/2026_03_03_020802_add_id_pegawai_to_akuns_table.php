<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('akuns', function (Blueprint $table) {
            $table->foreignId('id_pegawai')->nullable()->after('role')->constrained('pegawais')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('akuns', function (Blueprint $table) {
            $table->dropForeign(['id_pegawai']);
            $table->dropColumn('id_pegawai');
        });
    }
};
