<?php

use Illuminate\Database\Seeder;

class SloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($x = 0; $x <= 100; $x++) {
            $id = DB::table('slos')->insertGetId([
                'name' => $faker->sentence,
                'inactive' => 0,
                'team_id' => rand(1,20),
            ]);
        }
    }
}
