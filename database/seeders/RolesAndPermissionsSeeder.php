<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {

        $permissions = ['view-events', 'manage-events', 'manage-transactions'];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);


        $userRole->givePermissionTo('view-events');
        $adminRole->givePermissionTo($permissions);


        $adminUser = User::firstOrCreate([
            'email' => 'admin@email.com',
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('admin123'),
        ]);

        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin');
        }


        $normalUser = User::firstOrCreate([
            'email' => 'user@email.com',
        ], [
            'name' => 'Normal User',
            'password' => bcrypt('user123'),
        ]);


        if (!$normalUser->hasRole('user')) {
            $normalUser->assignRole('user');
        }
    }
}
