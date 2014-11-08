<?php

namespace User;


use Post\Post;

class Admin extends User
{

    protected $posts;

    public function blockUserComments(User $user)
    {
        $user->blockComments();
    }

    public function writePost($content, \Post\PostType\PostType $postType)
    {
        $post = new Post('Test Title',$postType);
        $this->posts[] = $post;
        return true;
    }

}