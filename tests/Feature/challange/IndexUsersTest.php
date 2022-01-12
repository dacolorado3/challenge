<?php

namespace Tests\Feature\challange;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexUsersTest extends TestCase
{
    use RefreshDatabase;

    public function testANotAuthenticatedCanNotListUsers()
    {
        $response = $this->get(route('users.index'));

        $response->assertRedirect('login');
    }

   public function testAnAuthenticatedUsersCanListUsers()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('users.index'));

        $response->assertOk();
        $usersResponse = $response->getOriginalContent()['users'];

        $response->assertViewIs('users.index');
        $response->assertViewHas('users');
        $this->assertEquals($user->id, $usersResponse->first()->id);


    }
}
