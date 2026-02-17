<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Player::factory(5)->create();
        User::factory()->admin()->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
        ]);

        User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@test.com',
        ]);


        $this->call([
            NoteSeeder::class,
        ]);
    }
}
