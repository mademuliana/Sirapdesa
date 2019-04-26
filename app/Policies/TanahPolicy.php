<?php

namespace App\Policies;

use App\User;
use App\Tanah;
use Illuminate\Auth\Access\HandlesAuthorization;

class TanahPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the tanah.
     *
     * @param  \App\User  $user
     * @param  \App\Tanah  $tanah
     * @return mixed
     */
    public function view(User $user, Tanah $tanah)
    {
        //
    }

    /**
     * Determine whether the user can create tanahs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the tanah.
     *
     * @param  \App\User  $user
     * @param  \App\Tanah  $tanah
     * @return mixed
     */
    public function update(User $user, Tanah $tanah)
    {
        //
    }

    /**
     * Determine whether the user can delete the tanah.
     *
     * @param  \App\User  $user
     * @param  \App\Tanah  $tanah
     * @return mixed
     */
    public function delete(User $user, Tanah $tanah)
    {
        //
    }
}
