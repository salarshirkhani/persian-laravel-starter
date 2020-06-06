<?php

namespace App\Policies;

use App\SliderItem;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderItemPolicy
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
        return $user->type == 'admin';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\SliderItem  $sliderItem
     * @return mixed
     */
    public function view(User $user, SliderItem $sliderItem)
    {
        return $user->type == 'admin';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->type == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\SliderItem  $sliderItem
     * @return mixed
     */
    public function update(User $user, SliderItem $sliderItem)
    {
        return $user->type == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SliderItem  $sliderItem
     * @return mixed
     */
    public function delete(User $user, SliderItem $sliderItem)
    {
        return $user->type == 'admin';
    }
}
