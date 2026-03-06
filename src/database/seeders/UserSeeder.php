<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name' => 'hoge',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'user_name' => 'hanako',
            'email' => 'test1@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
