<?php

namespace Database\Seeders;

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
        User::withoutSyncingToSearch(function () {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
            User::factory(100000)->create();
        });
    }
}
