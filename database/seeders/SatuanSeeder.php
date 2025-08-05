<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Ampul'], ['name' => 'Bal'], ['name' => 'Batang'], ['name' => 'Biji'],
            ['name' => 'Bungkus'], ['name' => 'Buah'], ['name' => 'Butir'], ['name' => 'Botol'],
            ['name' => 'Cm'], ['name' => 'Crt'], ['name' => 'Dos'], ['name' => 'Dus'],
            ['name' => 'Ekor'], ['name' => 'Ex'], ['name' => 'Galon'], ['name' => 'Gulung'],
            ['name' => 'Gram'], ['name' => 'Hektar'], ['name' => 'Ikat'], ['name' => 'Inchi'],
            ['name' => 'Kaleng'], ['name' => 'Karung'], ['name' => 'Keping'], ['name' => 'Kg'],
            ['name' => 'Koli'], ['name' => 'Kotak'], ['name' => 'Kubik'], ['name' => 'Kuintal'],
            ['name' => 'Lembar'], ['name' => 'Liter'], ['name' => 'Los'], ['name' => 'Lusin'],
            ['name' => 'M2'], ['name' => 'M3'], ['name' => 'Mg'], ['name' => 'Ml'],
            ['name' => 'Mtr'], ['name' => 'Ons'], ['name' => 'Paket'], ['name' => 'Pcs'],
            ['name' => 'Peti'], ['name' => 'Pot'], ['name' => 'Pound'], ['name' => 'Rim'],
            ['name' => 'Roll'], ['name' => 'Sachet'], ['name' => 'Sak'], ['name' => 'Set'],
            ['name' => 'Slop'], ['name' => 'Tablet']
        ];

        foreach ($data as $item) {
            Satuan::create($item);
        }
    }
}
