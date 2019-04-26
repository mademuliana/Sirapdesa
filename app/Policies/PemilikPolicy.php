<?php

namespace App\Policies;

use App\User;
use App\Pemilik;
use Illuminate\Auth\Access\HandlesAuthorization;

class PemilikPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pemilik.
     *
     * @param  \App\User  $user
     * @param  \App\Pemilik  $pemilik
     * @return mixed
     */
    public function view(User $user, Pemilik $pemilik)
    {
        //
    }

    /**
     * Determine whether the user can create pemiliks.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the pemilik.
     *
     * @param  \App\User  $user
     * @param  \App\Pemilik  $pemilik
     * @return mixed
     */
    public function update(User $user, Pemilik $pemilik)
    {
        //
    }

    /**
     * Determine whether the user can delete the pemilik.
     *
     * @param  \App\User  $user
     * @param  \App\Pemilik  $pemilik
     * @return mixed
     */
    public function delete(User $user, Pemilik $pemilik)
    {
        //
    }
}
