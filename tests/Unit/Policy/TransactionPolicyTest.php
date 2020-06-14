<?php

namespace Tests\Unit\Policy;

use App\Transaction;
use App\User;
use Tests\TestCase;

class TransactionPolicyTest extends TestCase
{
    public function test_user_can_verify_transaction() {
        $user = factory(User::class)->create(['type' => 'customer']);
        $transaction = factory(Transaction::class)->create(['user_id' => $user->id]);
        $this->assertTrue($user->can('verify', $transaction));
    }

    public function test_user_cannot_verify_others_transaction() {
        $user = factory(User::class)->create(['type' => 'customer']);
        $other = factory(User::class)->create(['type' => 'customer']);
        $transaction = factory(Transaction::class)->create(['user_id' => $other->id]);
        $this->assertFalse($user->can('verify', $transaction));
    }

    public function test_prevent_double_spending() {
        $user = factory(User::class)->create(['type' => 'customer']);
        $transaction = factory(Transaction::class)->create(['user_id' => $user->id, 'paid_at' => now()]);
        $this->assertFalse($user->can('verify', $transaction));
    }
}
