<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 16; $i++) {
            Book::create([
                'title' => $faker->words(2, true),
                'author' => $faker->name(),
            ]);
        }

        // id -> 1 - 16
    }
}
