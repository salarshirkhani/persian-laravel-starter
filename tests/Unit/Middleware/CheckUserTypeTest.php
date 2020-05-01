<?php

namespace Tests\Unit\Middleware;

use App\Http\Middleware\CheckUserType;
use App\User;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;
use Illuminate\Http\Request;

class CheckUserTypeTest extends TestCase
{
    public function test_forbidden_on_guest() {
        $middleware = new CheckUserType();

        $this->expectException(\Illuminate\Auth\AuthenticationException::class);
        $middleware->handle(Request::create('/'), function () {}, 'admin');
    }

    public function test_redirect_to_index_on_invalid_type() {
        $user = factory(User::class)->make([
            'type' => 'customer'
        ]);

        $this->actingAs($user);

        $middleware = new CheckUserType();

        $response = new TestResponse($middleware->handle(Request::create('/'), function () {}, 'admin'));
        $response->assertRedirect(route('dashboard.index'));
    }

    public function test_no_action_on_correct_type() {
        $user = factory(User::class)->make([
            'type' => 'admin'
        ]);

        $this->actingAs($user);

        $middleware = new CheckUserType();

        $response = $middleware->handle(Request::create('/'), function () { return null; }, 'admin');
        $this->assertNull($response);
    }
}
