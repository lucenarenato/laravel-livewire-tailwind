<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (User::count() === 0) {
            User::factory(10)->create();

            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        if (\App\Models\Challenge::count() === 0) {
            \App\Models\Challenge::factory(45)->create();
        }

        if (\App\Models\Company::count() === 0) {
            \App\Models\Company::factory(35)->create();
        }

        if (\App\Models\Program::count() === 0) {
            \App\Models\Program::factory(15)->create();
        }

        if (\App\Models\ProgramParticipant::count() === 0) {
            \App\Models\ProgramParticipant::factory(50)->create();
        }
    }
}
