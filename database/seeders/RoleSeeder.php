<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create(['name' => 'admin']);
        $admin_role->givePermissionTo(['new post', 'edit post', 'category', 'role']);

        $writer_role = Role::create(['name' => 'writer']);
        $writer_role->givePermissionTo(['new post', 'edit post', 'category']);

        $user_role = Role::create(['name' => 'user']);
        $user_role->givePermissionTo(['new post', 'edit post']);
    }
}
