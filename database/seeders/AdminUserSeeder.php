<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // This ensures the user isn't created twice if you run the seeder again
        User::updateOrCreate(
            ['email' => 'john@gmail.com'], // Check for this
            [
                'name' => 'John',
                'password' => 'admin@saunar', // The Model's 'hashed' cast will handle encryption
            ]
        );
    }
}