<?php

namespace Tests\Feature\challange;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class authenticationusersTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_render_a_login_view(): void
    {
        $response = $this->get( '/login');

        $response->assertOk();
        $response->assertSee(trans('email'));
    }

    public function test_it_can_login_user(): void
    {
       $user = User::factory()->verified()->create(['email' => 'danielatest@gmail.com']);

        $response = $this->post('/login', ['email' => $user->email, 'password' => 'password']);

        $response->assertSessionHasNoErrors();
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_it_dont_authenticates_with_wrong_password(): void
    {
        $user = User::factory()->verified()->create(['email' => 'danielatest@gmail.com']);

        $response = $this->post('/login', ['email' => $user->email, 'password' => 'password1']);

        $response->assertSessionHasErrors('email');
        $this->assertNull(Auth::user());
    }


}
