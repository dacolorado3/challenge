<?php

namespace Tests\Feature\challange;

use App\Models\User;
use Illuminate\Filesystem\Cache;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdateUsersTest extends TestCase
{
    use RefreshDatabase;

    public function testAAuthenticatedCanUpdateUser()
    {
        $data = [
            'name' => 'nametesting',
            'email' => 'daniela@test.com',
            'password'=>'admin',
            'password_confirmation'=>'admin',
        ];
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->patch(route('users.update', $user), $data);
        $user = $user->refresh();

        $this->assertEquals($data['name'], $user->name);
        $this->assertTrue(Hash::check($data['password'], $user->password));

        $response->assertRedirect(route('users.index'));

    }

    /**
     * @dataProvider usersDataProvider
     * @param string $field
     * @param string|null $value
     */

    public function testItCannotUpdateUsersWhenDataIsIncorrect(string $field, ? string $value)
    {
        $user = User::factory()->create();
        $data = [
            'name' => 'Daniela',
            'email' => 'dani',
            'password'=>'admin',
        ];

        $data[$field] = $value;

        $response = $this->actingAs($user)
            ->patch(route('users.update', $user), $data);

        $response->assertRedirect();
        $response->assertSessionHasErrors($field);
        $user = $user->refresh();

    }

    public function usersDataProvider(): array
    {
        return [
            'test name is required' => ['name', null],
            'test name is too sort' =>['name', 'd'],
            'test name is too long' => ['name', Str::random(151)],
            'test email is required' => ['email', null],
            'test email is not an email' => ['email', 'dany.colorado'],
            'test password is required' => ['password', null],
            'test password is too sort' =>['password', 'srd'],
            'test password is too long' => ['password', Str::random(81)],

        ];
    }
}
