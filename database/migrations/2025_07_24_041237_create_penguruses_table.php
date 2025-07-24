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
        Schema::create('penguruses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lembaga')->constrained('lembagas')->onDelete('cascade');
            $table->string('name', 100)->unique();
            $table->enum('jabatan', ['Pimpinan', 'Sekretaris', 'Bendahara']);
            $table->integer('nik')->length(20)->unique();
            $table->string('no_hp', 15)->nullable();
            $table->string('email')->nullable();
            $table->Text('alamat');
            $table->string('scan_ktp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguruses');
    }
};
