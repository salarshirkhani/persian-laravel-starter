<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Rinvex\Subscriptions\Models\Plan;

class PlanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return (empty($sub = $user->subscription($user->type)) || $sub->inactive()) &&
            ($user->type != 'owner' || !empty($user->company));
    }

    /**
     * Determine whether the user can subscribe to the plan.
     *
     * @param  \App\User  $user
     * @param  Plan       $plan
     * @return mixed
     */
    public function subscribe(User $user, Plan $plan)
    {
        $type = $user->type;
        return
            ($type != 'owner' || !empty($user->company)) &&
            strncmp($type, $plan->slug, strlen($type)) === 0 &&
            (empty($sub = $user->subscription($user->type)) || $sub->inactive());
    }

}
