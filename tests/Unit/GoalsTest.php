<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GoalsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->goal = factory('App\Goal')->create();
    }

    /** @test */
    public function a_new_goal_has_a_name()
    {
//        $this->actingAs(factory('App\User')->create());
//
//        $this->get('/goal')
//            ->assertSee($this->goal->name);
        $this->assertNotNull($this->goal->name);

    }

    /** @test */
//    public function a_logged_in_user_can_view_a_single_goal()
//    {
//        $this->actingAs(factory('App\User')->create());
//        $this->get('/goal/' . $this->goal->id)
//            ->assertSee($this->goal->name);
//
//
//    }
}
