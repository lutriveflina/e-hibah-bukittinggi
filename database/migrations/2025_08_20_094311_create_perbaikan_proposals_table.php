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
        Schema::create('perbaikan_proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_permohonan');
            $table->integer('revision_number')->default(1);
            $table->string('no_proposal');
            $table->date('tanggal_perbaikan');
            $table->string('judul_proposal');
            $table->string('file_proposal')->nullable();
            $table->string('file_rab')->nullable();
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
        Schema::dropIfExists('perbaikan_proposals');
    }
};
