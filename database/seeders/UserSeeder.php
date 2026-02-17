<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // voorkom dubbele users bij opnieuw seeden
        User::updateOrCreate(
            [
                'email' => 'tim@timbiesmans.be',
            ],
            [
                'name' => 'Tim Biesmans',
                'password' => Hash::make('yasiba'),
                'email_verified_at' => now(),
            ]
        );
    }
}