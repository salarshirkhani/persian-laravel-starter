<?php

namespace Tests\Feature\Dashboard\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Dashboard\CreateUser;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;
    use CreateUser;

    protected function getUserType()
    {
        return 'admin';
    }

    public function test_admin_can_see_dashboard_index() {
        $response = $this->get(route('dashboard.admin.index', [], false));
        $response->assertSessionHasNoErrors();
        $response->assertSuccessful();
    }

}
