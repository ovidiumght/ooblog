<?php

namespace User;

use Post\Post;

class Admin extends User
{
    protected $posts;

    protected $postsCount;

    public function write(Post $post)
    {
        $this->posts[] = $post;
        $this->postsCount++;
    }

    public function blockUserComments(User $user)
    {
        $user->blockComments();
    }

    public function getPostsCount()
    {
        return $this->postsCount;
    }

    public function getPosts()
    {
        return $this->posts;
    }
}