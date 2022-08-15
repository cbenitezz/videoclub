<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([

            ['name' => 'action'],
            ['name' => 'Adventures'],
            ['name' => 'Science Fiction'],
            ['name' => 'Comedy'],
            ['name' => 'Drama'],
            ['name' => 'Musical'],
            ['name' => 'Horror'],

        ]);
    }
}
