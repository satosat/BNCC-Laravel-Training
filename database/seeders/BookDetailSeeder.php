<?php

namespace Database\Seeders;

use App\Models\BookDetail;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookDetailSeeder extends Seeder
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
            BookDetail::create([
                'book_id' => $i + 1,
                'description' => $faker->sentence(),
                'length' => $faker->numberBetween(30, 1000),
                'publisher' => $faker->words(2, true),
                'stock' => $faker->numberBetween(0, 1000),
                'price' => $faker->numberBetween(5000, 500000),
            ]);
        }
    }
}
