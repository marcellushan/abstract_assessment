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
    $this->assertNotNull($this->assessor->username);

    }

    /** @test */
    public function assessor_has_a_name()
    {
        $this->assertNotNull($this->assessor->name);

    }
}
