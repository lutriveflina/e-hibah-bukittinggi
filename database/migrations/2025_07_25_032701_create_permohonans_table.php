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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lembaga')->constrained('lembagas');
            $table->string('no_mohon');
            $table->date('tanggal_mohon');
            $table->year('tahun_apbd');
            $table->string('perihal_mohon');
            $table->string('file_mohon');
            $table->string('no_proposal');
            $table->unsignedBigInteger('tanggal_proposal');
            $table->unsignedBigInteger('title');
            $table->unsignedBigInteger('urusan');
            $table->unsignedBigInteger('id_skpd');
            $table->date('awal_laksana');
            $table->date('akhir_laksana');
            $table->text('latar_belakang');
            $table->text('maksud_tujuan');
            $table->text('keterangan');
            $table->bigInteger('nominal_rab')->default(0);
            $table->unsignedBigInteger('id_status')->default(1);
            $table->bigInteger('nominal_rekomendasi')->default(0);
            $table->dateTime('tanggal_rekomendasi')->nullable();
            $table->string('catatan_rekomendasi')->nullable();
            $table->string('file_pemberitahuan')->nullable();
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
        Schema::dropIfExists('permohonans');
    }
};
