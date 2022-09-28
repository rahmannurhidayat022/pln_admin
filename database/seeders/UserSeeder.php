<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        \App\Models\User::insert([
            [ 
                'name' => 'Left4code',
                'email' => 'admin@pln.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'gender' => 'laki-laki',
                'active' => 1,
                'remember_token' => Str::random(10)
            ]
        ]);

        // Fake users
        User::factory()->times(9)->create();
    }
}