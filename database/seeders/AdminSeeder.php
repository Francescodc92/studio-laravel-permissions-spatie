<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

//helpers
use Illuminate\Support\Facades\Hash;
//models
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
        ])->assignRole('writer', 'admin');
    }
}
