<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'mahasiswa'
        ]);

        Role::create([
            'role_name' => 'dosen'
        ]);

        Role::create([
            'role_name' => 'kajur'
        ]);

        Role::create([
            'role_name' => 'sekjur'
        ]);

        Role::create([
            'role_name' => 'admin'
        ]);

        User::factory(10)->create();
    }
}
