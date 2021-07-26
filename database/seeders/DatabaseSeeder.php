<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(
            [
                RoleSeed::class,
                CategoriesSeeder::class,
                UserSeed::class,
                PostsSeed::class
            ]
        );
    }
}
