<?php

namespace Tests\Unit\Policy;

use App\SliderItem;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SliderItemPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_admins_full_access() {
        $user = factory(User::class)->make(['type' => 'admin']);
        $item = factory(SliderItem::class)->make();

        $this->assertTrue($user->can('viewAny', SliderItem::class));
        $this->assertTrue($user->can('view', $item));
        $this->assertTrue($user->can('create', SliderItem::class));
        $this->assertTrue($user->can('update', $item));
        $this->assertTrue($user->can('delete', $item));
    }

    public function test_users_no_access() {
        $user = factory(User::class)->make(['type' => 'owner']);
        $item = factory(SliderItem::class)->make();

        $this->assertFalse($user->can('viewAny', SliderItem::class));
        $this->assertFalse($user->can('view', $item));
        $this->assertFalse($user->can('create', SliderItem::class));
        $this->assertFalse($user->can('update', $item));
        $this->assertFalse($user->can('delete', $item));
    }
}
