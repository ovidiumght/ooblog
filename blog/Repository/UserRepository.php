<?php

namespace Blog\Repository;

use Blog\User\Admin;
use Blog\User\User;

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