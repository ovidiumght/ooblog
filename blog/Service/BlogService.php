<?php

namespace Service;

use Post\Post;
use Repository\UserRepository;

class BlogService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function post($data)
    {
        $user = $this->userRepository->findUser($data['userId']);

        $this->userRepository->saveUser($user);
        return true;
    }
}
