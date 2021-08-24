<?php

namespace Database\Seeders;

use App\Models\Category;
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
        User::create([
            'fname' => 'admin',
            'lname' => 'admin',
            'email' => "admin@admin.com",
            'username' => "admin123",
            'user_image' => "/uploads/author.PNG",
            'password' => Hash::make("password"),
            'about_me' => "lorem ipsum",
            'role_id' => Role::where('name','admin')->first()->id,
            'field_id' => Category::where('slug','culture')->first()->id,
            'social_media_account' => 'https://facebook.com/',
        ]);
        for($i=0;$i < 50; $i++) {
            User::create([
                'fname' => 'nabil' . $i,
                'lname' => 'merazga' . $i,
                'email' => "nabil@c{$i}.com",
                'username' => "fname". $i,
                'user_image' => "/uploads/author.PNG",
                'password' => Hash::make("password"),
                'about_me' => "lorem ipsum",
                'role_id' => Role::where('name','author')->first()->id,
                'field_id' => Category::where('slug','culture')->first()->id,
                'social_media_account' => 'https://facebook.com/',
            ]);
        }
    }
}
