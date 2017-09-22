<?php

use Illuminate\Database\Seeder;

class GoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals')->insert([
            'id' => 1,
            'name' => 'Effect quality teaching and learning focused on academic achievement and personal and professional growth. ',
            'inactive' => 0
        ]);
        DB::table('goals')->insert([
            'id' => 2,
            'name' => 'Provide comprehensive student services that encourage and enable all students to be successful learners.',
            'inactive' => 0
        ]);
        DB::table('goals')->insert([
            'id' => 3,
            'name' => 'Engage students in a challenging atmosphere that prepares them for responsibility and leadership in an evolving global environment.',
            'inactive' => 0
        ]);
        DB::table('goals')->insert([
            'id' => 4,
            'name' => 'Utilize appropriate technologies to advance programs, services and operations to support teaching and learning.',
            'inactive' => 0
        ]);
        DB::table('goals')->insert([
            'id' => 5,
            'name' => 'Maintain efficient and effective administrative services and facilities to support all programs of the college.',
            'inactive' => 0
        ]);
        DB::table('goals')->insert([
            'id' => 6,
            'name' => 'Foster community relationships that facilitate partnering for mutual success.',
            'inactive' => 0
        ]);
    }
}
