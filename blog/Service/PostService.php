<?php

namespace Service;

use Factory\PostFactory;
use Repository\PostRepository;
use Repository\UserRepository;

class PostService
{

    /** @var PostRepository  */
    protected $postRepository;

    /** @var  UserRepository */
    protected $userRepository;

    public function __construct(PostRepository $postRepository, UserRepository $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    public function writePost($data)
    {
        $postFactory = new PostFactory();
        $post = $postFactory->create($data);
        $user = $this->userRepository->findUser($data['userId']);

        $user->write($post);

        $this->userRepository->saveUser($user);

        return true;
    }
}
