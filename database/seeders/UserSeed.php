<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'nabil',
            'lname' => 'merazga',
            'email' => 'nabil@c.com',
            'password' => bcrypt("password"),
        ]);
    }
}
