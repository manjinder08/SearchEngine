<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\author;
use App\Models\books;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    //   \App\Models\Author::factory(8)->create();

        \App\Models\Book::factory(8)->create();
       
    }
}
