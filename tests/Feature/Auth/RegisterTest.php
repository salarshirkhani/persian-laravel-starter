<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_a_register_form()
    {
        $response = $this->get(route('register', [], false));

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function test_user_cannot_view_a_register_form_when_authenticated()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get(route('register', [], false));

        $response->assertRedirect(route('dashboard.index'));
    }

    public function test_user_can_register()
    {
        /** @var \App\User $user */
        $user = factory(User::class)->make([
            'password' => bcrypt($password = 'test-password'),
        ]);

        $response = $this->post(route('register', [], false), [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => $password,
            'password_confirmation' => $password,
            'type' => $type = 'customer'
        ]);

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect(route('dashboard.index'));
        $this->assertAuthenticated();
        /** @var \App\User $new_user */
        $new_user = \Auth::guard()->user();
        $this->assertInstanceOf('\App\User', $new_user);
        $this->assertEquals($user->first_name, $new_user->first_name);
        $this->assertEquals($user->last_name, $new_user->last_name);
        $this->assertEquals($user->email, $new_user->email);
        $this->assertTrue(\Hash::check($password, $new_user->password));
        $this->assertEquals($type, $new_user->type);

    }

    public function test_user_cannot_register_with_invalid_password_confirmation()
    {
        $user = factory(User::class)->make();

        $response = $this->from(route('register', [], false))->post(route('register', [], false), [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => 'test-password',
            'password_confirmation' => 'a-different-password',
            'type' => 'customer'
        ]);

        $response->assertRedirect(route('register', [], false));
        $response->assertSessionHasErrors('password');
        $this->assertGuest();

        $response = $this->from(route('register', [], false))->post(route('register', [], false), [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => 'test-password',
            'type' => 'customer'
        ]);

        $response->assertRedirect(route('register', [], false));
        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    public function test_user_cannot_register_with_invalid_type()
    {
        $user = factory(User::class)->make();

        $response = $this->from(route('register', [], false))->post(route('register', [], false), [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => $password = 'test-password',
            'password_confirmation' => $password,
            'type' => 'admin'
        ]);

        $response->assertRedirect(route('register', [], false));
        $response->assertSessionHasErrors('type');
        $this->assertGuest();
    }

    public function test_user_cannot_register_with_missing_first_name()
    {
        $user = factory(User::class)->make();

        $response = $this->from(route('register', [], false))->post(route('register', [], false), [
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => $password = 'test-password',
            'password_confirmation' => $password,
            'type' => 'customer'
        ]);

        $response->assertRedirect(route('register', [], false));
        $response->assertSessionHasErrors('first_name');
        $this->assertGuest();
    }

    public function test_user_cannot_register_with_missing_last_name()
    {
        $user = factory(User::class)->make();

        $response = $this->from(route('register', [], false))->post(route('register', [], false), [
            'first_name' => $user->first_name,
            'email' => $user->email,
            'password' => $password = 'test-password',
            'password_confirmation' => $password,
            'type' => 'customer'
        ]);

        $response->assertRedirect(route('register', [], false));
        $response->assertSessionHasErrors('last_name');
        $this->assertGuest();
    }

    public function test_user_cannot_register_with_missing_email()
    {
        $user = factory(User::class)->make();

        $response = $this->from(route('register', [], false))->post(route('register', [], false), [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'password' => $password = 'test-password',
            'password_confirmation' => $password,
            'type' => 'customer'
        ]);

        $response->assertRedirect(route('register', [], false));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_user_cannot_register_with_invalid_email()
    {
        $user = factory(User::class)->make();

        $response = $this->from(route('register', [], false))->post(route('register', [], false), [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => 'arbitrary-invalid-email@',
            'password' => $password = 'test-password',
            'password_confirmation' => $password,
            'type' => 'customer'
        ]);

        $response->assertRedirect(route('register', [], false));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_user_cannot_register_with_missing_password()
    {
        $user = factory(User::class)->make();

        $response = $this->from(route('register', [], false))->post(route('register', [], false), [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'type' => 'customer'
        ]);

        $response->assertRedirect(route('register', [], false));
        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    public function test_user_cannot_register_with_missing_type()
    {
        $user = factory(User::class)->make();

        $response = $this->from(route('register', [], false))->post(route('register', [], false), [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => $password = 'test-password',
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect(route('register', [], false));
        $response->assertSessionHasErrors('type');
        $this->assertGuest();
    }

}
