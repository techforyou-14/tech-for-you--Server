<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Game;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionServiceProvider;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // 123456
            'remember_token' => Str::random(10),
        ]);
        $admin->assignRole('admin');

        
        User::create([
            'name' => 'usuario1',
            'email' => 'user@manager.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // 123456
            'rate' => number_format(mt_rand(0, 10000) / 100, 2),
            'remember_token' => Str::random(10),
        ])->assignRole('user');

    }
}
