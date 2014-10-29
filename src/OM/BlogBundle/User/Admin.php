<?php

namespace OM\BlogBundle\User;


class Admin extends User
{

    public function blockUserComments(User $user)
    {
        $user->blockComments();
    }

}