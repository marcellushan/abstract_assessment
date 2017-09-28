<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssessorTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->assessor = factory('App\Assessor')->create();
    }

    /** @test */
    public function assessor_has_a_username()
    {
//        $this->actingAs(factory('App\User')->create());

//        $this->get('/goal')
//            ->assertSee($this->goal->name);
    $this->assert

    }
}
