<?php

namespace Tests\Feature\challange;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditUsersTest extends TestCase
{
    use RefreshDatabase;

    public function testANotAuthenticatedCanNotViewTheFormEdit()
    {
        $response = $this->get(route('users.index'));

        $response->assertRedirect('login');
    }
    public function testAAuthenticatedCanViewTheCreateForm()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('users.edit', $user));

        $response->assertOk();
        $response->assertViewIs('users.edit');
        $response->assertViewHas('user');
    }
}
