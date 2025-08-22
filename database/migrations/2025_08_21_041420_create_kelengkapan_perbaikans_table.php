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
        Schema::create('kelengkapan_perbaikans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_perbaikan');
            $table->unsignedBigInteger('id_pertanyaan_perbaikan');
            $table->boolean('is_ada')->default(false);
            $table->boolean('is_sesuai')->default(false);
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('kelengkapan_perbaikans');
    }
};
