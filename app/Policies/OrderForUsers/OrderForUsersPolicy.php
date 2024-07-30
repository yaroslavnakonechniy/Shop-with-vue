<?php

namespace App\Policies\OrderForUsers;

use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderForUsersPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function registered(User $user)
    {
        return $user !== null;
    }
}
