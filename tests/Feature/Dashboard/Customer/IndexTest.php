<?php

namespace Tests\Feature\Dashboard\Customer;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Dashboard\CreateUser;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use CreateUser;

    protected function getUserType()
    {
        return 'customer';
    }

    public function test_owner_can_see_dashboard_index() {
        $response = $this->get(route('dashboard.customer.index', [], false));
        $response->assertSessionHasNoErrors();
        $response->assertSuccessful();
    }

}
