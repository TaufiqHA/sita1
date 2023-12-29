<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kajur;
use App\Models\Sekjur;
use App\Models\Admin;

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

        User::create([
            'username' => 'taufiq',
            'email' => 'taufiq@gmail.com',
            'password' => bcrypt('matematika'),
            'role_id' => 1
        ]);

        Mahasiswa::create([
            'user_id' => 1
        ]);

        User::create([
            'username' => 'dosen',
            'email' => 'dosen@gmail.com',
            'password' => bcrypt('matematika'),
            'role_id' => 2
        ]);

        Dosen::create([
            'user_id' => 2
        ]);

        User::create([
            'username' => 'kajur',
            'email' => 'kajur@gmail.com',
            'password' => bcrypt('matematika'),
            'role_id' => 3
        ]);

        Kajur::create([
            'user_id' => 3
        ]);

        User::create([
            'username' => 'sekjur',
            'email' => 'sekjur@gmail.com',
            'password' => bcrypt('matematika'),
            'role_id' => 4
        ]);

        Sekjur::create([
            'user_id' => 4
        ]);

        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('matematika'),
            'role_id' => 5
        ]);

        Admin::create([
            'user_id' => 5
        ]);

        User::factory(5)->create();
    }
}
