<?php

namespace Tests\Unit\Policy;

use App\Company;
use App\Conversation;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConversationPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_cannot_view_convo_list() {
        $user = factory(User::class)->make();
        $this->assertFalse($user->can('viewAny', Conversation::class));
    }

    public function test_owners_can_view_convo_list() {
        $user = factory(User::class)->make(['type' => 'owner']);
        $this->assertTrue($user->can('viewAny', Conversation::class));
    }

    public function test_customers_can_view_convo_list() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $this->assertTrue($user->can('viewAny', Conversation::class));
    }

    ///////////

    public function test_users_cannot_view_convo() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $convo = factory(Conversation::class)->create();
        $this->assertFalse($user->can('view', $convo));
    }

    public function test_participants_can_view_convo() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $other = factory(User::class)->make(['type' => 'owner']);
        $convo = factory(Conversation::class)->create();
        $convo->parties()->saveMany([$user, $other]);
        $this->assertTrue($user->can('view', $convo));
        $this->assertTrue($other->can('view', $convo));
    }

    ///////////

    public function test_users_cannot_create_convo() {
        $user = factory(User::class)->make();
        $this->assertFalse($user->can('create', Conversation::class));
    }

    public function test_owners_can_create_convo_list() {
        $user = factory(User::class)->make(['type' => 'owner']);
        $this->assertTrue($user->can('create', Conversation::class));
    }

    public function test_customers_can_create_convo_list() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $this->assertTrue($user->can('create', Conversation::class));
    }

    ///////////

    public function test_users_cannot_update_convo() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $convo = factory(Conversation::class)->create();
        $this->assertFalse($user->can('update', $convo));
    }

    public function test_participants_can_update_convo() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $other = factory(User::class)->make(['type' => 'owner']);
        $convo = factory(Conversation::class)->create();
        $convo->parties()->saveMany([$user, $other]);
        $this->assertTrue($user->can('update', $convo));
        $this->assertTrue($other->can('update', $convo));
    }

    ///////////

    public function test_nobody_can_delete_convo() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $other = factory(User::class)->make(['type' => 'owner']);
        $convo = factory(Conversation::class)->create();
        $convo->parties()->saveMany([$user, $other]);
        $this->assertFalse($user->can('delete', $convo));
        $this->assertFalse($other->can('delete', $convo));
    }

    ///////////

    public function test_nobody_can_restore_convo() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $other = factory(User::class)->make(['type' => 'owner']);
        $convo = factory(Conversation::class)->create();
        $convo->parties()->saveMany([$user, $other]);
        $this->assertFalse($user->can('restore', $convo));
        $this->assertFalse($other->can('restore', $convo));
    }

    ///////////

    public function test_nobody_can_force_delete_convo() {
        $user = factory(User::class)->make(['type' => 'customer']);
        $other = factory(User::class)->make(['type' => 'owner']);
        $convo = factory(Conversation::class)->create();
        $convo->parties()->saveMany([$user, $other]);
        $this->assertFalse($user->can('forceDelete', $convo));
        $this->assertFalse($other->can('forceDelete', $convo));
    }

}
