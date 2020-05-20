<?php

namespace Tests\Feature\Dashboard\Owner;

use App\Company;
use App\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\Feature\Dashboard\CreateUser;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;
    use CreateUser;

    protected function getUserType()
    {
        return 'owner';
    }

    public function test_owner_cannot_view_service_creation_without_company()
    {
        $response = $this->get(route('dashboard.owner.services.create', [], false));
        $response->assertForbidden();
    }

    public function test_owner_can_view_service_creation_with_company()
    {
        factory(Company::class)->state('service')->create(['creator_id' => $this->user->id]);
        $response = $this->get(route('dashboard.owner.services.create', [], false));
        $response->assertSuccessful();
        $response->assertViewIs('dashboard.owner.services.create');
    }

    public function test_owner_can_create_service()
    {
        \Storage::fake('public');
        $company = factory(Company::class)->state('service')->create(['creator_id' => $this->user->id]);
        $response = $this->post(
            route('dashboard.owner.services.store', [], false),
            array_merge(factory(Service::class)->raw(), ['photo' => UploadedFile::fake()->create('file.png')])
        );
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('dashboard.owner.companies.show', $company, false));
    }
}
