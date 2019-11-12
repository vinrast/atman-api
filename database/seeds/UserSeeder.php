<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Vincen Santaella';
        $user->email = 'vinrast@gmail.com';
        $user->password = Hash::make('secret');
        $user->role_id = 1;
        $user->save();
    }
}
