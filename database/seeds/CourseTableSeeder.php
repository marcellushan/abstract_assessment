<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
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
            $id = DB::table('courses')->insertGetId([
                'name' => strtoupper(substr($faker->word, 0, 4) ). rand(1000,9999),
            ]);
        }
    }
}
