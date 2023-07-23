<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        User::create(['name' => 'jane', 'email' => 'jane99168@gmail.com', 'password' => Hash::make('dfgdf441geDSFs')]);
        User::create(['name' => 'RJ', 'email' => 'jo901025@gmail.com', 'password' => Hash::make('root')]);
    }
}
