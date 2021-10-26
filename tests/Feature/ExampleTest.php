<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::first();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertSeeText('Logout');

        $response->assertStatus(200);
    }
}
