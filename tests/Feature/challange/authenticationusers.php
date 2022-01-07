<?php

namespace Tests\Feature\challange;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\HasUser;

class authenticationusers extends TestCase
{
    use RefreshDatabase;
    use HasUser;

    public function test_it_can_render_a_login_view(): void
    {
        $response = $this->get( '/login');

        $response->assertOk();
        $response->assertSee(trans('Email'));
    }

    public function test_it_can_login_user(): void
    {
        $user = $this->enabledUser(['email' => 'danycolorado@hotmail.com']);

        $response = $this->post('/login', ['email' => $user->email(), 'password' => 'password']);

        $response->assertSessionHasNoErrors();
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_it_dont_authenticates_with_wrong_password(): void
    {
        $user = $this->user(['email' => 'danycolorado@hotmail.com']);

        $response = $this->post('/login', ['email' => $user->email(), 'password' => 'password1']);

        $response->assertSessionHasErrors('email');
        $this->assertNull(Auth::user());
    }

    public function test_a_disabled_user_cant_login(): void
    {
        $this->expectException(UserDisabledException::class);
        $this->withoutExceptionHandling();

        $user = $this->disabledUser(['email' => 'danycolorado302@hotmail.com']);
        $this->post('/login', ['email' => $user->email(), 'password' => 'password']);

        $this->assertNull(Auth::user());
    }
}
