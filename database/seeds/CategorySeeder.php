<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('categories')->insert([
                'created_at' => $faker->dateTimeThisYear(),
                'name' => $faker->word(),
                'color' => $faker->hexColor()
            ]);
        }
    }
}
