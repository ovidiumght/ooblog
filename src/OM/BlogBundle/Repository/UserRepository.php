<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 11/5/14
 * Time: 8:42 PM
 */

namespace OM\BlogBundle\Repository;


interface UserRepository {

    public function findUser($userId);

    public function saveUser($userId);
} 