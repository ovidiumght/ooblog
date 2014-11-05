<?php

namespace OM\BlogBundle\User;


use OM\BlogBundle\Post\Post;

class Admin extends User
{

    protected $posts;

    public function blockUserComments(User $user)
    {
        $user->blockComments();
    }

    public function writePost($content, \OM\BlogBundle\Post\PostType\PostType $postType)
    {
        $post = new Post('Test Title',$postType);
        $this->posts[] = $post;
        return true;
    }

}