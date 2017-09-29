<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($x = 0; $x <= 20; $x++) {
            $id = DB::table('teams')->insertGetId([
                'name' => $faker->word,
                'mission' => $faker->sentence,

            ]);
        }
    }
}
