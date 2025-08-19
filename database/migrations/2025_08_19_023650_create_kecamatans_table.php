<?php

use App\Models\Kecamatan;
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
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kabkota');
            $table->string('name');
            $table->timestamps();
        });

        $items = [
            ['id_kabkota' => 1, 'name' => 'Guguk Panjang'],
            ['id_kabkota' => 1, 'name' => 'Mandiangin Koto Selayan'],
            ['id_kabkota' => 1, 'name' => 'Aur Birugo Tigo Baleh'],
        ];

        foreach($items as $key => $item){
            Kecamatan::create([
                'id_kabkota' => $item['id_kabkota'],
                'name' => $item['name'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatans');
    }
};
