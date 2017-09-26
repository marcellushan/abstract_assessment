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
    public function a_user_can_view_all_goals()
    {

        $this->get('/goal')
            ->assertSee($this->goal->name);

    }

    /** @test */
    public function a_user_can_view_a_single_goal()
    {
        $this->get('/goal/' . $this->goal->id)
            ->assertSee($this->goal->name);


    }
}
