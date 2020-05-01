<?php

namespace Tests\Unit\Middleware;

use App\Http\Middleware\CheckUserType;
use App\User;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;
use Illuminate\Http\Request;

class CheckUserTypeTest extends TestCase
{
    private const TYPES = ['admin', 'customer', 'owner'];

    public function routeDataProvider()
    {
        return [
            'admin-type' => ['/dashboard/admin', 'admin'],
            'customer-type' => ['/dashboard/customer', 'customer'],
            'owner-type' => ['/dashboard/owner', 'owner'],
        ];
    }

    /**
     * @dataProvider routeDataProvider
     */
    public function test_forbidden_on_guest($route, $type) {
        $request = Request::create($route);
        $this->expectException(\Illuminate\Auth\AuthenticationException::class);

        $middleware = new CheckUserType();

        $middleware->handle($request, function ($req) {}, $type);
    }

    /**
     * @dataProvider routeDataProvider
     */
    public function test_redirect_to_index_on_invalid_type($route, $type) {
        foreach (array_diff(self::TYPES, [$type]) as $invalid_type) {
            $user = factory(User::class)->make([
                'type' => $invalid_type
            ]);

            $this->actingAs($user);

            $request = Request::create($route);

            $middleware = new CheckUserType();

            $response = new TestResponse($middleware->handle($request, function () {}, $type));
            $response->assertRedirect('/dashboard');
        }

    }

    /**
     * @dataProvider routeDataProvider
     */
    public function test_no_action_on_correct_type($route, $type) {
        $user = factory(User::class)->make([
            'type' => $type
        ]);

        $this->actingAs($user);

        $request = Request::create($route);

        $middleware = new CheckUserType();

        $response = $middleware->handle($request, function () { return null; }, $type);
        $this->assertNull($response);
    }
}
