<?php

namespace Tests\Feature\challange;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexUsers extends TestCase
{
    use RefreshDatabase;

    public function test_you_can_list_users(): void
    {
        User::factory()->count(2)->create();

        $response = $this->get(route('Users.index'));

        $response->assertOk();

    }
}
