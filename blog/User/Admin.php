<?php

namespace User;

use Post\Post;

class Admin extends User
{
    protected $posts;

    public function write(Post $post)
    {
        $this->posts[] = $post;
    }

    public function blockUserComments(User $user)
    {
        $user->blockComments();
    }

    public function getPostsCount()
    {
        return count($this->posts);
    }

    public function getPosts()
    {
        return $this->posts;
    }
}