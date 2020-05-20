<?php

namespace Tests\Unit\Policy;

use App\Company;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_admins_full_access() {
        $user = factory(User::class)->make(['type' => 'admin']);
        $company = factory(Company::class)->state('product')->make();

        $this->assertTrue($user->can('viewAny', Company::class));
        $this->assertTrue($user->can('view', $company));
        $this->assertTrue($user->can('create', Company::class));
        $this->assertTrue($user->can('update', $company));
        $this->assertTrue($user->can('delete', $company));
        $this->assertTrue($user->can('restore', $company));
        $this->assertTrue($user->can('forceDelete', $company));
    }

    ///////////

    public function test_users_cannot_view_company_list() {
        $user = factory(User::class)->make();
        $this->assertFalse($user->can('viewAny', Company::class));
    }

    ///////////

    public function test_users_cannot_view_company() {
        $user = factory(User::class)->make();
        $company = factory(Company::class)->state('product')->make();
        $this->assertFalse($user->can('view', $company));
    }

    public function test_former_owners_cannot_view_company() {
        $user = factory(User::class)->create(['type' => 'customer']);
        $company = factory(Company::class)->state('product')->make(['creator_id' => $user->getKey()]);
        $this->assertFalse($user->can('view', $company));
    }

    public function test_all_owners_cannot_view_company() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('product')->make();
        $this->assertFalse($user->can('view', $company));
    }

    public function test_company_owner_can_view_company() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('product')->make(['creator_id' => $user->getKey()]);
        $this->assertTrue($user->can('view', $company));
    }

    ///////////

    public function test_customers_cannot_create_company() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $this->assertFalse($user->can('create', Company::class));
    }

    public function test_owners_can_create_company() {
        $user = factory(User::class)->make(['type' => 'owner']);
        $this->assertTrue($user->can('create', Company::class));
    }

    public function test_already_created_owners_cannot_create_company() {
        $user = factory(User::class)->create(['type' => 'owner']);
        factory(Company::class)->state('product')->create(['creator_id' => $user->getKey()]);
        $this->assertFalse($user->can('create', Company::class));
    }

    ///////////

    public function test_users_cannot_update_company() {
        $user = factory(User::class)->make();
        $company = factory(Company::class)->state('product')->make();
        $this->assertFalse($user->can('update', $company));
    }

    public function test_former_owners_cannot_update_company() {
        $user = factory(User::class)->create(['type' => 'customer']);
        $company = factory(Company::class)->state('product')->make(['creator_id' => $user->getKey()]);
        $this->assertFalse($user->can('update', $company));
    }

    public function test_all_owners_cannot_update_company() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('product')->make();
        $this->assertFalse($user->can('update', $company));
    }

    public function test_company_owner_can_update_company() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('product')->make(['creator_id' => $user->getKey()]);
        $this->assertTrue($user->can('update', $company));
    }

    ///////////

    public function test_users_cannot_delete_company() {
        $user = factory(User::class)->make();
        $company = factory(Company::class)->state('product')->make();
        $this->assertFalse($user->can('delete', $company));
    }

    public function test_former_owners_cannot_delete_company() {
        $user = factory(User::class)->create(['type' => 'customer']);
        $company = factory(Company::class)->state('product')->make(['creator_id' => $user->getKey()]);
        $this->assertFalse($user->can('delete', $company));
    }

    public function test_all_owners_cannot_delete_company() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('product')->make();
        $this->assertFalse($user->can('delete', $company));
    }

    public function test_company_owner_can_delete_company() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('product')->make(['creator_id' => $user->getKey()]);
        $this->assertTrue($user->can('delete', $company));
    }

    ///////////

    public function test_nobody_can_restore_company() {
        $user = factory(User::class)->make(['type' => 'owner']);
        $company = factory(Company::class)->state('product')->make(['creator_id' => $user->getKey()]);

        $this->assertFalse($user->can('restore', $company));
    }

    ///////////

    public function test_nobody_can_force_delete_company() {
        $user = factory(User::class)->create(['type' => 'owner']);
        $company = factory(Company::class)->state('product')->make(['creator_id' => $user->getKey()]);

        $this->assertFalse($user->can('forceDelete', $company));
    }
}
