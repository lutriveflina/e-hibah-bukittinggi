<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // $superAdmin = Role::create(['name' => 'Super Admin']);
        
        // contoh user superadmin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => bcrypt('@zaq123qwerty'),
            'id_role' => 1,
        ]);

        Permission::create([
            'name' => 'View All User',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'View User',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'Create User',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'Edit User',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'Delete User',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'Restore User',
            'guard_name' => 'web'
        ]);
    }
}
