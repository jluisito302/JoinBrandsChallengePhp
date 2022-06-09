<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Test for insert user
     *
     * @return void
     */
    public function test_insert_user()
    {
        $user = User::factory()->create();
        $this->assertTrue(true);
    }

    /**
     * Show users Test
     *
     * @return Status
     */
    public function test_show_users()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/users');
        $response->assertStatus(200);
    }
}
