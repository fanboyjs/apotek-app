<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ownerRole = Role::create([
            'name' => 'owner',
        ]);

        $buyerRole = Role::create([
            'name' => 'buyer',
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        $consumer = User::create([
            'name' => 'Consumer',
            'email' => 'consumer@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        $admin->assignRole($ownerRole);
        $consumer->assignRole($buyerRole);
    }
}
