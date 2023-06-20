<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder 
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         $admin = Role::create(['name' => 'admin']);
         $user = Role::create(['name' => 'user']);

        Permission::create(['name' => 'users.login'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'users.register'])->syncRoles([$admin, $user]);

        //users
        Permission::create(['name' => 'users.update'])->assignRole($user);
        Permission::create(['name' => 'users.logout'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'users.delete'])->assignRole($user);
        Permission::create(['name' => 'users.show'])->assignRole($user);

        //trees
        Permission::create(['name' => 'trees.create'])->assignRole($user);
        Permission::create(['name' => 'trees.update'])->assignRole($user);
        Permission::create(['name' => 'trees.delete'])->assignRole($user);
        Permission::create(['name' => 'trees.show'])->assignRole($user);
    
    }
}