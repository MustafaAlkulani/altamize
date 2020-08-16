<?php

namespace App\Policies;

use App\UserAccount;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPermission
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

    public function showData(  $user)
    {

        if($user->id==49)
            return true ;
        else
            return false ;
    }
}
