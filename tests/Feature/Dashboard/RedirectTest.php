<?php

namespace Tests\Feature\Dashboard;

use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectTest extends TestCase
{
    protected function getUserType()
    {
        return 'owner';
    }

    public function test_redirect_to_login_on_forbidden()
    {
        $response = $this->get(route('dashboard.index', [], false));

        $response->assertRedirect(route('login', [], false));
    }

    public function test_redirect_to_correct_dashboard()
    {
        $user = factory(User::class)->make();
        $this->actingAs($user);

        $user->type = 'customer';
        $this
            ->get(route('dashboard.index', [], false))
            ->assertRedirect(route('dashboard.customer.index', [], false));

        $user->type = 'owner';
        $this
            ->get(route('dashboard.index', [], false))
            ->assertRedirect(route('dashboard.owner.index', [], false));

        $user->type = 'admin';
        $this
            ->get(route('dashboard.index', [], false))
            ->assertRedirect(route('dashboard.admin.index', [], false));
    }

    public function test_redirect_to_home_on_invalid_type()
    {
        $user = factory(User::class)->make(['type' => 'random-type-idk']);
        $this->actingAs($user);
        $this
            ->get(route('dashboard.index', [], false))
            ->assertRedirect(route('index', [], false));
    }
}
