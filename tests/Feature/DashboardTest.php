<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssessorFeatureTest extends TestCase
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
//    public function assessor_name_is_visible_on_dashboard()
//    {
//        $slo = factory('App\Slo')->create(['team_id' => $this->team->id]);
//        $response = $this->get('/dashboard/assessor/' . $this->assessor->id)
//            ->assertSee($this->assessor->name);
//    }

    /** @test */
    public function assessor_saved_assessments_are_visible()
    {
        $slo = factory('App\Slo')->create(['team_id' => $this->team->id]);
        $assessment = factory('App\Assessment')->create(['assessor_id' => $this->assessor->id, 'team_id' => $this->team->id , 'slo_id' => $slo->id ]);
        $response = $this->get('/dashboard/assessor/' . $this->assessor->id)
            ->assertSee($assessment->slo->name);
    }

    /** @test */
    public function assessor_submitted_assessments_are_visible()
    {
        $slo = factory('App\Slo')->create(['team_id' => $this->team->id]);
        $assessment = factory('App\Assessment')->create(['assessor_id' => $this->assessor->id, 'team_id' => $this->team->id , 'slo_id' => $slo->id, 'submit_date' => date('Y-m-d') ]);
        $response = $this->get('/dashboard/assessor/' . $this->assessor->id)
            ->assertSee($assessment->slo->name);
    }

    /** @test */
//    public function team_reassessments_are_visible()
//    {
//        $reassessment = factory('App\Reassessment')->create(['team_id' => $this->team->id ]);
//        $slo = factory('App\Slo')->create(['team_id' => $this->team->id]);
//        $assessment = factory('App\Assessment')->create(['assessor_id' => $this->assessor->id, 'team_id' => $this->team->id , 'slo_id' => $slo->id, 'submit_date' => date('Y-m-d') ]);
//        $response = $this->get('/dashboard/assessor/' . $this->assessor->id)
//            ->assertS(1,1);
//    }



}
