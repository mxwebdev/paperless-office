<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KeywordSeeder extends Seeder
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
            DB::table('keywords')->insert([
                'created_at' => $faker->dateTimeThisYear(),
                'name' => $faker->word(),
                'color' => $faker->hexColor()
            ]);
        }
    }
}
