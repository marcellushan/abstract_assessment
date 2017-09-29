<?php

use Illuminate\Database\Seeder;

class AssessorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($x = 0; $x <= 30; $x++) {
            $id = DB::table('assessors')->insertGetId([
                'username' => $faker->userName,
                'name' => $faker->name(),
            ]);
        }
    }
}
