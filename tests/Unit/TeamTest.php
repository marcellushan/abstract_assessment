<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamTest extends TestCase
{
    use DatabaseMigrations;

    /** @test  */
    function it_has_slos_assigned()
    {
        $slo = factory('App\Slo')->create();
        $this->assertInstanceOf('App\Team', $slo->team);
    }
}

