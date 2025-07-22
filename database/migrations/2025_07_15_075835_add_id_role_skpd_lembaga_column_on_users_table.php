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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_role')->constraint('roles')->after('remember_token');
            $table->unsignedBigInteger('id_skpd')->nullable()->constraint('skpds')->after('id_role');
            $table->unsignedBigInteger('id_lembaga')->nullable()->constraint('skpds')->after('id_skpd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id_skpd');
            $table->dropColumn('id_lembaga');
            //
        });
    }
};
