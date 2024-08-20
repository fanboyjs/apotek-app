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

        $user = User::create([
            'name'     => 'Rama Pemilik',
            'email'    => 'rama@pemilik.com',
            'password' => bcrypt('123456789'),
        ]);

        $user->assignRole($ownerRole);
    }
}
