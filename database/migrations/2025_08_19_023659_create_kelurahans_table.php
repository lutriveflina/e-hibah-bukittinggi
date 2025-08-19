<?php

use App\Models\Kelurahan;
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
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kecamatan');
            $table->string('name');
            $table->timestamps();
        });

        $items = [
            // Kecamatan Guguk Panjang (id_kecamatan = 1)
            ['id_kecamatan' => 1, 'name' => 'Aur Tajungkang Tengah Sawah'],
            ['id_kecamatan' => 1, 'name' => 'Benteng Pasar Atas'],
            ['id_kecamatan' => 1, 'name' => 'Bukit Apit Puhun'],
            ['id_kecamatan' => 1, 'name' => 'Bukit Cangang Kayu Ramang'],
            ['id_kecamatan' => 1, 'name' => 'Kayu Kubu'],
            ['id_kecamatan' => 1, 'name' => 'Pakan Kurai'],
            ['id_kecamatan' => 1, 'name' => 'Tarok Dipo'],

            // Kecamatan Mandiangin Koto Selayan (id_kecamatan = 2)
            ['id_kecamatan' => 2, 'name' => 'Campago Guguak Bulek'],
            ['id_kecamatan' => 2, 'name' => 'Campago Ipuh'],
            ['id_kecamatan' => 2, 'name' => 'Garegeh'],
            ['id_kecamatan' => 2, 'name' => 'Koto Selayan'],
            ['id_kecamatan' => 2, 'name' => 'Kubu Gulai Bancah'],
            ['id_kecamatan' => 2, 'name' => 'Manggis Ganting'],
            ['id_kecamatan' => 2, 'name' => 'Puhun Pintu Kabun'],
            ['id_kecamatan' => 2, 'name' => 'Puhun Tembok'],
            ['id_kecamatan' => 2, 'name' => 'Pulai Anak Air'],

            // Kecamatan Aur Birugo Tigo Baleh (id_kecamatan = 3)
            ['id_kecamatan' => 3, 'name' => 'Aur Kuning'],
            ['id_kecamatan' => 3, 'name' => 'Belakang Balok'],
            ['id_kecamatan' => 3, 'name' => 'Birugo'],
            ['id_kecamatan' => 3, 'name' => 'Kubu Tanjung'],
            ['id_kecamatan' => 3, 'name' => 'Ladang Cakiah'],
            ['id_kecamatan' => 3, 'name' => 'Pakan Labuah'],
            ['id_kecamatan' => 3, 'name' => 'Parik Antang'],
            ['id_kecamatan' => 3, 'name' => 'Sapiran'],
        ];

        foreach($items as $key => $item){
            Kelurahan::create([
                'id_kecamatan' => $item['id_kecamatan'],
                'name' => $item['name'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahans');
    }
};
