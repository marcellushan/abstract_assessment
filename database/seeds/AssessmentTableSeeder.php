<?php

use Illuminate\Database\Seeder;

class AssessmentTableSeeder extends Seeder
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
            $id = DB::table('assessments')->insertGetId([
                'assessor_id' => rand(1,30),
                'period' => 2017,
                'slo_id' => rand(1,202),
                'goal_id' => rand(1,7),
                'team_id' => rand(1,24),
                'method' => $faker->paragraph,
                'measure' => $faker->paragraph,
                'course' => strtoupper(substr($faker->word, 0, 4) ). rand(1000,9999),
            ]);
        }
    }
}
