<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MainTest extends TestCase
{
    /**
     * @test
     * @group passing
     */
    public function testWeb()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSeeText('hamza');
    }
}
