<?php

namespace Service;


use Comment\Comment;
use Repository\PostRepository;
use Repository\UserRepository;

class CommentService
{
    protected $postRepository;

    protected $userRepository;

    public function __construct(PostRepository $postRepository,UserRepository $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    public function comment($data)
    {
        $post = $this->postRepository->findPost($data['postId']);
        $user = $this->userRepository->findUser($data['userId']);

        $comment = new Comment($data['comment']);
        $user->commentOn($post,$comment);

        $this->postRepository->savePost($post);

        return true;
    }
} 