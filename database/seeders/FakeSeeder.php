<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $admin = User::factory()->create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'role' => 'admin',
            'photoprofile' => '',
        ]);
    }
}
