<?php

use App\Models\KabKota;
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
        Schema::create('kab_kotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_propinsi');
            $table->string('name');
            $table->timestamps();
        });

        $items = [
            ['id_propinsi' => 1, 'name' => 'Kota Bukittinggi'],
        ];

        foreach($items as $key => $item){
            KabKota::create([
                'id_propinsi' => $item['id_propinsi'],
                'name' => $item['name'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kab_kotas');
    }
};
