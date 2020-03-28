<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Bus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Jobs\BillUsers;

class BillingTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A test for billing users using mock api
     *
     * @return void
     */
    public function testBillUserTest()
    {
        // $response = $this->get('/api/billuser');

        // $response->assertStatus(200);

       // $this->withoutExceptionHandling();

       $this->withExceptionHandling();
        Bus::fake();
        //$user = factory(User::class)->create();
        factory(\App\User::class, 5)->create()->each(function ($user) {
            //$this->get('/example/job');
            Bus::assertDispatched(BillUsers::class, function ($job) use ($user) {
                return $job->user->id === $user->id;
            });
        });
        // $user = factory(User::class)->create();
        // $this->get('/example/job');      
        // Bus::assertDispatched(BillUsers::class, function ($job) use ($user) {
        //     return $job->user->id === $user->id;
        // });


    }


    // public function testBasicTest()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
