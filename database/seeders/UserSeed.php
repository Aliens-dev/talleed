<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i < 50; $i++) {
            User::create([
                'fname' => 'nabil' . $i,
                'lname' => 'merazga' . $i,
                'email' => "nabil@c{$i}.com",
                'password' => Hash::make("password"),
                'role_id' => Role::where('name','author')->first()->id,
            ]);
        }
    }
}
