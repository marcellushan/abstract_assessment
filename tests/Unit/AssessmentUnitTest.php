<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssessmentUnitTest extends TestCase
{
    use DatabaseMigrations;

    /** @test  */
    function it_has_an_assessor()
    {
        $assessment = factory('App\Assessment')->create();
        $this->assertInstanceOf('App\Assessor', $assessment->assessor);
    }
}
