<?php

use App\Models\Propinsi;
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
        Schema::create('propinsis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $items = [
            ['name' => 'Sumatera Barat'],
        ];

        foreach($items as $key => $item){
            Propinsi::create([
                'name' => $item['name']
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propinsis');
    }
};
