<?php

use App\Models\Permission;
use App\Models\Role;
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
        Schema::table('permissions', function (Blueprint $table) {
            //
        });

        $permissions = [
            // User
            ['name' => 'View Any Nphd', 'guard_name' => 'web'],
        ];
        
        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        Role::where('name', 'Super Admin')->syncPermissions([
            'view Any Nphd'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            //
        });
    }
};
