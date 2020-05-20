<?php

namespace Tests\Feature\Dashboard\Owner;

use App\Company;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\Feature\Dashboard\CreateUser;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    use CreateUser;

    protected function getUserType()
    {
        return 'owner';
    }

    public function test_owner_cannot_view_product_creation_without_company()
    {
        $response = $this->get(route('dashboard.owner.products.create', [], false));
        $response->assertForbidden();
    }

    public function test_owner_can_view_product_creation_with_company()
    {
        factory(Company::class)->state('product')->create(['creator_id' => $this->user->id]);
        $response = $this->get(route('dashboard.owner.products.create', [], false));
        $response->assertSuccessful();
        $response->assertViewIs('dashboard.owner.products.create');
    }

    public function test_owner_can_create_product()
    {
        \Storage::fake('public');
        $company = factory(Company::class)->state('product')->create(['creator_id' => $this->user->id]);
        $response = $this->post(
            route('dashboard.owner.products.store', [], false),
            array_merge(factory(Product::class)->raw(), ['photo' => UploadedFile::fake()->create('file.png')])
        );
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('dashboard.owner.companies.show', $company, false));
    }
}
