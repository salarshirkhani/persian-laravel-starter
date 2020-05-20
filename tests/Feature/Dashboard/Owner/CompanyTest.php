<?php

namespace Tests\Feature\Dashboard\Owner;

use App\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\Feature\Dashboard\CreateUser;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;
    use CreateUser;
    use AdditionalAssertions;

    protected function getUserType()
    {
        return 'owner';
    }

    public function test_owner_can_view_company_creation()
    {
        $response = $this->get(route('dashboard.owner.companies.create', [], false));

        $response->assertSuccessful();
        $response->assertViewIs('dashboard.owner.companies.create');
    }

    public function test_owner_can_view_company()
    {
        $company = factory(Company::class)->state('product')->create(['creator_id' => $this->user->id]);
        $response = $this->get(route('dashboard.owner.companies.show', $company, false));

        $response->assertSuccessful();
        $response->assertViewIs('dashboard.owner.companies.show');
    }

    public function test_owner_can_create_company()
    {
        $response = $this->post(
            route('dashboard.owner.companies.store', [], false),
            array_merge(factory(Company::class)->raw(), [
                'type' => 'product',
                'keywords' => 'A,B,C'
            ])
        );
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route(
            'dashboard.owner.companies.show',
            Company::orderBy('created_at', 'desc')->first(),
            false)
        );
    }

}
