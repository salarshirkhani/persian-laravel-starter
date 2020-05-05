<?php

namespace Tests\Unit\Policy;

use App\Company;
use App\Product;
use App\Service;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductAndServicePolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_admins_full_access() {
        $user = factory(User::class)->make(['type' => 'admin']);
        $product = factory(Product::class)->make();

        $this->assertTrue($user->can('viewAny', Product::class));
        $this->assertTrue($user->can('view', $product));
        $this->assertTrue($user->can('create', Product::class));
        $this->assertTrue($user->can('update', $product));
        $this->assertTrue($user->can('delete', $product));
        $this->assertTrue($user->can('restore', $product));
        $this->assertTrue($user->can('forceDelete', $product));
    }

    ///////////

    public function test_users_cannot_view_item_list() {
        $user = factory(User::class)->make();
        $this->assertFalse($user->can('viewAny', Product::class));
    }

    ///////////

    public function test_users_cannot_view_item() {
        $user = factory(User::class)->make();

        $product = factory(Product::class)->make();
        $this->assertFalse($user->can('view', $product));
    }

    public function test_former_owners_cannot_view_item() {
        $user = factory(User::class)->create(['type' => 'customer']);

        $company = factory(Company::class)->state('product')->create(['creator_id' => $user->getKey()]);
        $product = factory(Product::class)->make(['company_id' => $company->getKey()]);
        $this->assertFalse($user->can('view', $product));
    }

    public function test_all_owners_cannot_view_item() {
        $user = factory(User::class)->create(['type' => 'owner']);

        $company = factory(Company::class)->state('product')->create();
        $product = factory(Product::class)->make(['company_id' => $company->getKey()]);
        $this->assertFalse($user->can('view', $product));
    }

    public function test_company_owner_can_view_item() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('product')->make(['creator_id' => $user->getKey()]);
        $this->assertTrue($user->can('view', $company));
    }


    ///////////

    public function test_customers_cannot_create_item() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $this->assertFalse($user->can('create', Product::class));
        $this->assertFalse($user->can('create', Service::class));
    }

    public function test_owners_cannot_create_item_without_company() {
        $user = factory(User::class)->make(['type' => 'owner']);
        $this->assertFalse($user->can('create', Product::class));
        $this->assertFalse($user->can('create', Service::class));
    }

    public function test_owners_can_create_item_with_company() {
        $user = factory(User::class)->create(['type' => 'owner']);
        factory(Company::class)->state('product')->create(['creator_id' => $user->getKey()]);

        $this->assertTrue($user->can('create', Product::class));
        $this->assertTrue($user->can('create', Service::class));
    }

    ///////////

    public function test_users_cannot_update_item() {
        $user = factory(User::class)->make();

        $product = factory(Product::class)->make();
        $this->assertFalse($user->can('update', $product));

        $product = factory(Service::class)->make();
        $this->assertFalse($user->can('update', $product));
    }

    public function test_former_owners_cannot_update_item() {
        $user = factory(User::class)->create(['type' => 'customer']);
        $company = factory(Company::class)->state('product')->create(['creator_id' => $user->getKey()]);
        $product = factory(Product::class)->make(['company_id' => $company->getKey()]);
        $this->assertFalse($user->can('update', $product));
    }

    public function test_all_owners_cannot_update_item() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $product = factory(Product::class)->make();
        $this->assertFalse($user->can('update', $product));
    }

    public function test_company_owner_cannot_update_incompatible_item() {
        $user = factory(User::class)->create(['type' => 'owner']);

        $company = factory(Company::class)->state('product')->create(['creator_id' => $user->getKey()]);
        $service = factory(Service::class)->make(['company_id' => $company->getKey()]);
        $this->assertFalse($user->can('update', $service));
        $company->delete();

        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('service')->create(['creator_id' => $user->getKey()]);
        $product = factory(Product::class)->make(['company_id' => $company->getKey()]);
        $this->assertFalse($user->can('update', $product));
    }

    public function test_company_owner_can_update_item() {
        $user = factory(User::class)->create(['type' => 'owner']);

        $company = factory(Company::class)->state('product')->create(['creator_id' => $user->getKey()]);
        $product = factory(Product::class)->make(['company_id' => $company->getKey()]);
        $this->assertTrue($user->can('update', $product));
        $company->delete();

        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('service')->create(['creator_id' => $user->getKey()]);
        $service = factory(Service::class)->make(['company_id' => $company->getKey()]);
        $this->assertTrue($user->can('update', $service));
    }

    ///////////

    public function test_users_cannot_delete_item() {
        $user = factory(User::class)->make();

        $product = factory(Product::class)->make();
        $this->assertFalse($user->can('delete', $product));

        $product = factory(Service::class)->make();
        $this->assertFalse($user->can('delete', $product));
    }

    public function test_former_owners_cannot_delete_item() {
        $user = factory(User::class)->create(['type' => 'customer']);
        $company = factory(Company::class)->state('product')->create(['creator_id' => $user->getKey()]);
        $product = factory(Product::class)->make(['company_id' => $company->getKey()]);
        $this->assertFalse($user->can('delete', $product));
    }

    public function test_all_owners_cannot_delete_item() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $product = factory(Product::class)->make();
        $this->assertFalse($user->can('delete', $product));
    }

    public function test_company_owner_cannot_delete_incompatible_item() {
        $user = factory(User::class)->create(['type' => 'owner']);

        $company = factory(Company::class)->state('product')->create(['creator_id' => $user->getKey()]);
        $service = factory(Service::class)->make(['company_id' => $company->getKey()]);
        $this->assertFalse($user->can('delete', $service));
        $company->delete();

        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('service')->create(['creator_id' => $user->getKey()]);
        $product = factory(Product::class)->make(['company_id' => $company->getKey()]);
        $this->assertFalse($user->can('delete', $product));
    }

    public function test_company_owner_can_delete_item() {
        $user = factory(User::class)->create(['type' => 'owner']);

        $company = factory(Company::class)->state('product')->create(['creator_id' => $user->getKey()]);
        $product = factory(Product::class)->make(['company_id' => $company->getKey()]);
        $this->assertTrue($user->can('delete', $product));
        $company->delete();

        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('service')->create(['creator_id' => $user->getKey()]);
        $service = factory(Service::class)->make(['company_id' => $company->getKey()]);
        $this->assertTrue($user->can('delete', $service));
    }

    ///////////

    public function test_nobody_can_restore_item() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $product = factory(Product::class)->make(['creator_id' => $user->getKey()]);

        $this->assertFalse($user->can('restore', $product));
    }

    ///////////

    public function test_nobody_can_force_delete_item() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $product = factory(Product::class)->make(['creator_id' => $user->getKey()]);

        $this->assertFalse($user->can('restore', $product));
    }
}
