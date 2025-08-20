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
        Schema::table('permohonans', function (Blueprint $table) {
            $table->integer('status_rekomendasi')->after('id_status')->default(0)->comment('0: Belum ada rekomendasi, 1: Rekomendasi Diterima, 2: Rekomendasi Diperbaiki, 3: Rekomendasi Ditolak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {
            $table->dropColumn('status_rekomendasi');
        });
    }
};
