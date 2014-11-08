<?php

namespace Repository;

use User\Admin;
use User\User;

interface UserRepository {

    /**
     * Finds an user by Id
     *
     * @param $userId
     * @return User|Admin
     */
    public function findUser($userId);

    public function saveUser(User $user);

}