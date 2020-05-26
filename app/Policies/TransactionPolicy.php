<?php

namespace App\Policies;

use App\Transaction;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can use this transaction.
     *
     * @param  \App\User  $user
     * @param  \App\Transaction  $transaction
     * @return mixed
     */
    public function verify(User $user, Transaction $transaction)
    {
        return empty($transaction->paid_at) && !empty($transaction->user_id) && $transaction->user_id == $user->id;
    }
}
