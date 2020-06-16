<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Pranita Mangrulkar',
            'email'=>'riteshnimje28@gmail.com',
            'password'=> Hash::make('password'),
            'remember_token'=> Str::random(12),
        ]);
    }
}
