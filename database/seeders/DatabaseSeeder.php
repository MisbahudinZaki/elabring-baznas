<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'user_id'=>'1',
            'name' => 'Zaki',
            'email' => 'zaki@example.com',
            'password' => bcrypt('12345678'),
            'status' => 'admin',
            'user_status'=>'aktif',
            'email_verified_at' => now(),
         ]);
    }
}
