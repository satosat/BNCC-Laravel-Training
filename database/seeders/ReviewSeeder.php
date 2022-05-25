<?php

namespace Database\Seeders;

use App\Models\Review;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
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
            for ($j=0; $j < 5; $j++) {
                Review::create([
                    'user_id' => $faker->numberBetween(1, 7),
                    'book_id' => $i + 1,
                    'comment' => $faker->sentence()
                ]);
            }
        }
    }
}
