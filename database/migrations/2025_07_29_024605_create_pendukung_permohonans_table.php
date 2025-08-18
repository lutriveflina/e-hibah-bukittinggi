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
        Schema::create('pendukung_permohonans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_permohonan');
            $table->string('file_pernyataan_tanggung_jawab');
            $table->string('struktur_pengurus');
            $table->string('file_rab');
            $table->string('saldo_akhir_rek');
            $table->string('no_tidak_tumpang_tindih');
            $table->date('tanggal_tidak_tumpang_tindih');
            $table->string('file_tidak_tumpang_tindih');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendukung_permohonans');
    }
};
