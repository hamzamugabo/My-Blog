<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    /**
     * Test store blog
     * @test
     */
    public function can_store_blog()
    {
        $body=[
            'title'=>'string',
            'contents'=>'strong'
        ];
        $response = $this->get('/blogs',$body);

        $response->assertStatus('201');
    }

    public function can_create_blog()
    {
    $response = $this->get('/blogs/create',['title'=>'string','contents'=>'string']);
    $response->assertStatus(201);
    }

}
