<?php

namespace Database\Seeders;

use App\Models\User;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $admin = User::factory()->create([
        //     'email' => 'admin@gmail.com',
        //     'name' => 'Admin',
        //     'role' => 'admin',
        //     'password' => 'password',
        //     'photoprofile' => '',
        // ]);

           $this->call(FakeSeeder::class);
    }
}
