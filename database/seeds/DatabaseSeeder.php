<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(GoalTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(SloTableSeeder::class);
;
    }
}
