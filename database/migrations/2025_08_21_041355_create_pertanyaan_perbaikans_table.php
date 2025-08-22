<?php

use App\Models\PertanyaanPerbaikan;
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
        Schema::create('pertanyaan_perbaikans', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->timestamps();
        });

        $questions = [
            [
                'question' => 'Proposal yang telah diperbaiki',
            ],[
                'question' => 'RAB yang diperbaiki',
            ],[
                'question' => 'Nilai RAB sesuai rekomendasi',
            ],
        ];

        foreach ($questions as $key => $item) {
            PertanyaanPerbaikan::create(['question' => $item['question']]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan_perbaikans');
    }
};
