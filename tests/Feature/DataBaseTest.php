<?php

namespace Tests\Feature;

use App\Device;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use Illuminate\Http\Response;


class DataBaseTest extends TestCase
{
    use RefreshDatabase, WithFaker;





    /**
     * @test
     *
     * @group passing
     */
    public function testExample()
    {
        factory(Post::class)->create();
        $this->get('/devices')->assertStatus(200);
        $this->get('/devices/create')->assertStatus(200);
//        $this->post('/devicesaction')->assertStatus(200);
        $this->assertDatabaseHas('posts',[
            'posted_by'=>'hamza',

        ]);


    }

    /**
     * @test
     * @group passing
     *
     */

    public function formTest(){
//        $device = factory(Device::class)->create([
//
//        ]);

            $response = $this->json('POST', '/devicesaction', [
            'name' => 'motor',
            'description' => 'baby lock motor',
        ]);
//        $response->assertStatus(302);
//        dd($response);

        $response->assertStatus(201);

        $response->assertJson([
            'name' => 'motor',
            'description' => 'baby lock motor',
        ]);

    }
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }



    /**
     * @test
     * @group passing
     */
    public function request_should_fail_when_no_description_is_provided()
    {


        $response = $this->Json('post', '/devicesaction', [
            'name' => 'computer',
//            'description' => 'dell',
        ]);
//        dd($response);

        $response->assertStatus(422);


        $response->assertJsonValidationErrors('description');


    }


    /**
     * @test
     * @group passing
     */

    public function request_should_fail_when_no_name_is_provided()
    {
        $response = $this->Json('post', '/devicesaction', [
//            'name' => 'computer',
            'description' => 'dell',
        ]);
//        dd($response);

        $response->assertStatus(422);


        $response->assertJsonValidationErrors('name');


    }

    /**
     * @test
     * @group passing
     */

    public function request_should_pass_when_data_is_provided()
    {
        $response = $this->Json('post', '/devicesaction', [
            'name' => 'computer',
            'description' => 'dell',
        ]);

        $response->assertStatus(201);

        $response->assertJson([
            'name' => 'computer',
            'description' => 'dell',
        ]);

        $response->assertJsonStructure([

            'name',
            'description',

        ]);
//        $response->assertJsonValidationErrors('description');

    }
}
