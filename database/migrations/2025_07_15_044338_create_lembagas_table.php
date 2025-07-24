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
        Schema::create('lembagas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('id_skpd')->constraint('skpds');
            $table->string('email');
            $table->integer('phone')->length(15);
            $table->text('alamat');
            $table->integer('npwp')->length(20);
            $table->string('no_akta_kumham');
            $table->date('date_akta_kumham');
            $table->string('file_akta_kumham');
            $table->string('no_domisili');
            $table->date('date_domisili');
            $table->string('file_domisili');
            $table->string('no_operasional');
            $table->date('date_operasional');
            $table->string('file_operasional');
            $table->string('no_pernyataan');
            $table->date('date_pernyataan');
            $table->string('file_pernyataan');
            $table->unsignedBigInteger('id_bank')->nullable();
            $table->string('atas_nama')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('photo_rek')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembagas');
    }
};
