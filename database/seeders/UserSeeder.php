<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // superadmin
        \App\Models\User::factory(1)->create([
            'name' => 'Superadmin',
            'email' => 'superadmin@kps.com',
            'password' => bcrypt('superadmin')
        ]);

        // admin
        \App\Models\User::factory(1)->create([
            'name' => 'Admin',
            'email' => 'admin@kps.com',
            'password' => bcrypt('admin')
        ]);
    }
}
