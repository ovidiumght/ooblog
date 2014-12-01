<?php

namespace Blog\User;

use Blog\Entity\Entity;
use Blog\Entity\Identity;

class User extends Guest implements Entity
{
    use Identity;

    protected $userName;

    public function __construct($userName)
    {
        $this->userName = $userName;
    }

    public function getUsername()
    {
        return $this->userName;
    }

    public function blockComments()
    {
        $this->canPost = false;
    }

} 