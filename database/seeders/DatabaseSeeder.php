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

        $permissions = [
            // User
            ['name' => 'View Any User', 'guard_name' => 'web'],
            ['name' => 'View User', 'guard_name' => 'web'],
            ['name' => 'Create User', 'guard_name' => 'web'],
            ['name' => 'Update User', 'guard_name' => 'web'],
            ['name' => 'Delete User', 'guard_name' => 'web'],
            ['name' => 'Restore User', 'guard_name' => 'web'],

            // Role
            ['name' => 'View Any Role', 'guard_name' => 'web'],
            ['name' => 'View Role', 'guard_name' => 'web'],
            ['name' => 'Create Role', 'guard_name' => 'web'],
            ['name' => 'Update Role', 'guard_name' => 'web'],
            ['name' => 'Delete Role', 'guard_name' => 'web'],
            ['name' => 'Restore Role', 'guard_name' => 'web'],

            // Permission
            ['name' => 'View Any Permission', 'guard_name' => 'web'],
            ['name' => 'Create Permission', 'guard_name' => 'web'],
            ['name' => 'Update Permission', 'guard_name' => 'web'],
            ['name' => 'Delete Permission', 'guard_name' => 'web'],
            ['name' => 'Restore Permission', 'guard_name' => 'web'],

            // Lembaga
            ['name' => 'View Any Lembaga', 'guard_name' => 'web'],
            ['name' => 'View Admin Lembaga', 'guard_name' => 'web'],
            ['name' => 'View Lembaga', 'guard_name' => 'web'],
            ['name' => 'Create Lembaga', 'guard_name' => 'web'],
            ['name' => 'Update Lembaga', 'guard_name' => 'web'],
            ['name' => 'Delete Lembaga', 'guard_name' => 'web'],
            ['name' => 'Restore Lembaga', 'guard_name' => 'web'],

            // Permohonan
            ['name' => 'View Any Permohonan', 'guard_name' => 'web'],
            ['name' => 'View Permohonan', 'guard_name' => 'web'],
            ['name' => 'Create Permohonan', 'guard_name' => 'web'],
            ['name' => 'Update Permohonan', 'guard_name' => 'web'],
            ['name' => 'Delete Permohonan', 'guard_name' => 'web'],
            ['name' => 'Restore Permohonan', 'guard_name' => 'web'],
            ['name' => 'View Dukung Permohonan', 'guard_name' => 'web'],
            ['name' => 'View Rab Permohonan', 'guard_name' => 'web'],
            ['name' => 'Check Permohonan', 'guard_name' => 'web'],
            ['name' => 'Send Permohonan', 'guard_name' => 'web'],
            ['name' => 'Review Permohonan', 'guard_name' => 'web'],
            ['name' => 'Reviewed Permohonan', 'guard_name' => 'web'],
            ['name' => 'Confirm Permohonan', 'guard_name' => 'web'],
            ['name' => 'Upload Rab Permohonan', 'guard_name' => 'web'],

            // Skpd
            ['name' => 'View Any Skpd', 'guard_name' => 'web'],
            ['name' => 'View Skpd', 'guard_name' => 'web'],
            ['name' => 'Create Skpd', 'guard_name' => 'web'],
            ['name' => 'Update Skpd', 'guard_name' => 'web'],
            ['name' => 'Delete Skpd', 'guard_name' => 'web'],
            ['name' => 'Restore Skpd', 'guard_name' => 'web'],

            // Pertanyaan
            ['name' => 'View Any Pertanyaan', 'guard_name' => 'web'],
            ['name' => 'View Pertanyaan', 'guard_name' => 'web'],
            ['name' => 'Create Pertanyaan', 'guard_name' => 'web'],
            ['name' => 'Update Pertanyaan', 'guard_name' => 'web'],
            ['name' => 'Delete Pertanyaan', 'guard_name' => 'web'],
            ['name' => 'Restore Pertanyaan', 'guard_name' => 'web'],
        ];

        // Insert permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        $permission_for_super_admin = Permission::all()->except(
            Permission::where('name', 'View Admin Lembaga')->first()->id
        );

        Role::create(['name' => 'Super Admin', 'guard_name' => 'web'])->syncPermissions($permission_for_super_admin);
        Role::create(['name' => 'Admin SKPD', 'guard_name' => 'web'])->syncPermissions([
            'View Any Lembaga',
            'View Lembaga',
            'View Any Permohonan',
            'Check Permohonan',
            'Review Permohonan',
            'Reviewed Permohonan',
            'Reviewed Permohonan',
        ]);
        Role::create(['name' => 'Reviewer', 'guard_name' => 'web'])->syncPermissions([
            'View Any Permohonan',
            'Check Permohonan',
            'Review Permohonan',
            'Send Permohonan',
        ]);
        Role::create(['name' => 'Verifikator', 'guard_name' => 'web'])->syncPermissions([
            'View Any Permohonan',
            'Check Permohonan',
            'Review Permohonan',
            'Send Permohonan',
        ]);
        Role::create(['name' => 'Admin Lembaga', 'guard_name' => 'web'])->syncPermissions([
            'View Admin Lembaga',
            'Create Lembaga',
            'Update Lembaga',
            'View Any Permohonan',
            'Create Permohonan',
            'View Dukung Permohonan',
            'View Rab Permohonan',
            'Check Permohonan',
            'Send Permohonan',
        ]);
        
        // contoh user superadmin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => bcrypt('@zaq123qwerty'),
            'id_role' => 1,
        ])->assignRole('Super Admin');
    }
}
