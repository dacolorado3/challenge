<?php

namespace Tests\Feature\challange;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreUsers extends TestCase
{
    use RefreshDatabase;

    public function testANotAuthenticatedCanNotStoreUser()
    {
        $response = $this->get(route('users.store'));

        $response->assertRedirect('login');
    }
    public function testAAuthenticatedCanStoreUser()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('users.store'), [
                'name' => 'Daniela',
                'email' => 'danycolorado@hotmail.com',
                'password'=>'admin'
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Daniela',
            'email' => 'danycolorado@hotmail.com',
        ]);

        $response->assertRedirect(route('users.index'));


    }
}
