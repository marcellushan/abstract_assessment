<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssessmentTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->assessor = factory('App\Assessor')->create();
        $this->team = factory('App\Team')->create();
        $this->assessor->teams()->attach($this->team->id);
    }

    /** @test */
    public function assessor_name_is_visible_on_create_assessment()
    {
//        $slo = factory('App\Slo')->create(['team_id' => $this->team->id]);
        $response = $this->get('/assessment/create/'. $this->team->id . '/'  . $this->assessor->id)
            ->assertSee($this->assessor->name);
    }



//    public function assessor_name_is_visible_on_assessment()
//    {
////        $slo = factory('App\Slo')->create(['team_id' => $this->team->id]);
//        $response = $this->get('/assessment/create/'. $this->team->id . '/'  . $this->assessor->id)
//            ->assertSee($this->assessor->name);
//    }
}
