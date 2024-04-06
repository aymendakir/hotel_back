<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\client::factory()->create([
            'nom_client' => 'Test User',
            'prenom_client'=>'haha',
            'CIN_client'=>'wa33417',
            'email' => 'nytaayman@gmail.com',
            'password' => '123456789'
     ]);  \App\Models\employe::factory()->create([
            'nom' => 'Test User',
            'prenom'=>'mmm',
            'email' => 'nytaayman@gmail.com',
            'password' => '123456789'
     ]);
    }
}
