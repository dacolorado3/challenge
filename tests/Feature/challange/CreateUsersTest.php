<?php

namespace Tests\Feature\challange;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateUsersTest extends TestCase
{
    use RefreshDatabase;

    public function testANotAuthenticatedCanNotViewTheCreateForm()
    {
        $response = $this->get(route('users.create'));

        $response->assertRedirect('login');
    }
    public function testAAuthenticatedCanViewTheCreateForm()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('users.create'));

        $response->assertOk();
        $response->assertViewIs('users.create');
        $response->assertSee('name');
        $response->assertSee('email');
        $response->assertSee('password');
        $response->assertSee('create');



    }
}
