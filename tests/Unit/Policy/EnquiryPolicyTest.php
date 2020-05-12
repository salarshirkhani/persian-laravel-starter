<?php

namespace Tests\Unit\Policy;

use App\Category;
use App\Company;
use App\Enquiry;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnquiryPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_admins_full_access() {
        $user = factory(User::class)->make(['type' => 'admin']);
        $enquiry = factory(Enquiry::class)->state('product')->make();

        $this->assertTrue($user->can('viewAny', Enquiry::class));
        $this->assertTrue($user->can('view', $enquiry));
        $this->assertTrue($user->can('create', Enquiry::class));
        $this->assertTrue($user->can('update', $enquiry));
        $this->assertTrue($user->can('delete', $enquiry));
        $this->assertTrue($user->can('restore', $enquiry));
        $this->assertTrue($user->can('forceDelete', $enquiry));
    }

    ///////////

    public function test_users_cannot_view_enquiry_list() {
        $user = factory(User::class)->make();
        $this->assertFalse($user->can('viewAny', Enquiry::class));
    }

    public function test_owners_can_view_enquiry_list() {
        $user = factory(User::class)->make(['type' => 'owner']);
        $this->assertTrue($user->can('viewAny', Enquiry::class));
    }

    public function test_customers_can_view_enquiry_list() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $this->assertTrue($user->can('viewAny', Enquiry::class));
    }

    ///////////

    public function test_users_cannot_view_enquiry() {
        $user = factory(User::class)->make();
        $enquiry = factory(Enquiry::class)->make(['creator_id' => $user->getKey()]);
        $this->assertFalse($user->can('view', $enquiry));
    }

    public function test_owners_cannot_view_non_relevant_enquiry() {
        $customer = factory(User::class)->create(['type' => 'customer']);
        $owner = factory(User::class)->create(['type' => 'owner']);
        $companyCategory = factory(Category::class)->state('product')->create();
        $enquiryCategory = factory(Category::class)->state('product')->create();
        factory(Company::class)->state('product')->create(['creator_id' => $owner->id, 'category_id' => $companyCategory->id]);
        $enquiry = factory(Enquiry::class)->state('product')->create(['creator_id' => $customer->id, 'category_id' => $enquiryCategory->id]);
        $this->assertFalse($owner->can('view', $enquiry));
    }

    public function test_owners_can_view_relevant_enquiry() {
        $customer = factory(User::class)->create(['type' => 'customer']);
        $owner = factory(User::class)->create(['type' => 'owner']);
        $category = factory(Category::class)->state('product')->create();

        factory(Company::class)->state('product')->create(['creator_id' => $owner->id, 'category_id' => $category->id]);
        $enquiry = factory(Enquiry::class)->state('product')->create(['creator_id' => $customer->id, 'category_id' => $category->id]);
        $this->assertTrue($owner->can('view', $enquiry));
    }

    public function test_customers_cannot_view_others_enquiry() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $another_user = factory(User::class)->create(['type' => 'customer']);
        $enquiry = factory(Enquiry::class)->make(['creator_id' => $another_user->getKey()]);
        $this->assertFalse($user->can('view', $enquiry));
    }

    public function test_customers_can_view_own_enquiry() {
        $user = factory(User::class)->create(['type' => 'customer']);
        $enquiry = factory(Enquiry::class)->make(['creator_id' => $user->getKey()]);
        $this->assertTrue($user->can('view', $enquiry));
    }

    ///////////

    public function test_users_cannot_create_enquiry() {
        $user = factory(User::class)->make(['type' => 'owner']);
        $this->assertFalse($user->can('create', Enquiry::class));
    }

    public function test_customers_can_create_enquiry() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $this->assertTrue($user->can('create', Enquiry::class));
    }

    ///////////

    public function test_users_cannot_update_enquiry() {
        $user = factory(User::class)->make();
        $enquiry = factory(Enquiry::class)->make(['creator_id' => $user->getKey()]);
        $this->assertFalse($user->can('update', $enquiry));
    }

    public function test_customers_cannot_update_others_enquiry() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $another_user = factory(User::class)->create(['type' => 'customer']);
        $enquiry = factory(Enquiry::class)->make(['creator_id' => $another_user->getKey()]);
        $this->assertFalse($user->can('update', $enquiry));
    }

    public function test_customers_can_update_own_enquiry() {
        $user = factory(User::class)->create(['type' => 'customer']);
        $enquiry = factory(Enquiry::class)->make(['creator_id' => $user->getKey()]);
        $this->assertTrue($user->can('update', $enquiry));
    }

    ///////////

    public function test_nobody_can_delete_enquiry() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $enquiry = factory(Enquiry::class)->make(['creator_id' => $user->getKey()]);
        $this->assertFalse($user->can('delete', $enquiry));
    }

    ///////////

    public function test_nobody_can_restore_enquiry() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $enquiry = factory(Enquiry::class)->make(['creator_id' => $user->getKey()]);
        $this->assertFalse($user->can('restore', $enquiry));
    }

    ///////////

    public function test_nobody_can_force_delete_enquiry() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $enquiry = factory(Enquiry::class)->make(['creator_id' => $user->getKey()]);
        $this->assertFalse($user->can('forceDelete', $enquiry));
    }
}
