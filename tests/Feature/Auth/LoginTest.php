<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'test-password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('correct-password'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertEquals($user->email, session()->getOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function test_remember_me_functionality()
    {
        $user = factory(User::class)->create([
            'id' => random_int(1, 100),
            'password' => bcrypt($password = 'correct-password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            'remember' => 'on',
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
        $response->assertCookie(\Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
            $user->id,
            $user->getRememberToken(),
            $user->password,
        ]));
        $this->assertAuthenticatedAs($user);
    }
}
