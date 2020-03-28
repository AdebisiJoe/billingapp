<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Bus;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
        $user = factory(User::class)->create();
        $response = $this->get('/api/billuser');
        Bus::assertDispatched(BillJob::class, function ($job) use ($user) {
            return $job->user->id === $user->id;
        });


    }


    // public function testBasicTest()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
