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
        Schema::create('perbaikan_rincian_rabs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_perbaikan_rab');
            $table->string('keterangan');
            $table->integer('volume');
            $table->unsignedBigInteger('id_satuan');
            $table->BigInteger('harga');
            $table->BigInteger('subtotal');
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
        Schema::dropIfExists('perbaikan_rincian_rabs');
    }
};
