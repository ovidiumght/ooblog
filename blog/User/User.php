<?php

namespace User;


use Exception\UserCannotPostException;
use Post\Post;

class User
{
    protected $userName;

    protected $userId;

    protected $canPost = true;

    public function __construct($userName)
    {
        $this->userName = $userName;
    }

    public function getUsername()
    {
        return $this->userName;
    }

    public function commentOn(Post $post, $comment)
    {
        if(!$this->canPost) {
            throw new UserCannotPostException('The user is not allowed to comment on this post');
        }

        $post->addComment($this->userId,$comment);

        return true;
    }

    public function blockComments()
    {
        $this->canPost = false;
    }

} 