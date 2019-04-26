<?php

namespace App\Policies;

use App\User;
use App\Pemetakan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PemetakanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pemetakan.
     *
     * @param  \App\User  $user
     * @param  \App\Pemetakan  $pemetakan
     * @return mixed
     */
    public function view(User $user, Pemetakan $pemetakan)
    {
        //
    }

    /**
     * Determine whether the user can create pemetakans.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the pemetakan.
     *
     * @param  \App\User  $user
     * @param  \App\Pemetakan  $pemetakan
     * @return mixed
     */
    public function update(User $user, Pemetakan $pemetakan)
    {
        //
    }

    /**
     * Determine whether the user can delete the pemetakan.
     *
     * @param  \App\User  $user
     * @param  \App\Pemetakan  $pemetakan
     * @return mixed
     */
    public function delete(User $user, Pemetakan $pemetakan)
    {
        //
    }
}
