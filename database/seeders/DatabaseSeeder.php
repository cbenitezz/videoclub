<?php

namespace Database\Seeders;

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

        $this->call([TypeSeeder::class, GenreSeeder::class]);
        \App\Models\User::factory(10)->create();
        \App\Models\Movie::factory(20)->create();


    }
}
