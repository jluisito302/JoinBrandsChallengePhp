<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class ChangeStatusTest extends TestCase
{
    /**
     * Test for change status at user
     *
     * @return void
     */
    public function test_change_status()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(
            sprintf('/change_status/%s',$user->id)
        );
        $response->assertStatus(302);
    }
}
