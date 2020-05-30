<?php

namespace App\Policies;

use App\Conversation;
use App\Message;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
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
        return $user->type == 'customer' || $user->type == 'owner';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User $user
     * @param  \App\Conversation $conversation
     * @return mixed
     */
    public function view(User $user, Conversation $conversation)
    {
        return
            ($user->type == 'customer' || $user->type == 'owner') && $conversation->parties->contains($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $todayCount = Message
            ::where('created_at', '>=', now()->startOfDay())
            ->where('from_id', $user->id)
            ->groupBy('conversation_id')
            ->count();
        $sub = $user->subscription($user->type);
        return
            (
                (empty($sub) && $todayCount < 1) ||
                (!empty($sub) && $sub->canUseFeature('conversations_per_day'))
            ) && $user->type == 'customer' || $user->type == 'owner';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function update(User $user, Conversation $conversation)
    {
        return $this->create($user) && $conversation->parties->contains($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function delete(User $user, Conversation $conversation)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function restore(User $user, Conversation $conversation)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function forceDelete(User $user, Conversation $conversation)
    {
        return false;
    }
}
