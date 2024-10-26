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
        $this->call([ProductSeeder::class,]);
        $this->call([PhotoSeeder::class]);

        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'password' => 'password',
             'email' => 'ayakaddoura10@gmail.com',
         ]);
    }
}
