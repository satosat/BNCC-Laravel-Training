<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 5; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->safeEmail(),
                'password' => Hash::make('satsatsat')
            ]);
        }

        // Create admin user
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('satsatsat'),
            'is_admin' => true,
        ]);

        // Create normal user
        User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('satsatsat'),
        ]);
    }
}
