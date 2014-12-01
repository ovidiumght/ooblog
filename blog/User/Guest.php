<?php

namespace Blog\User;

use Blog\Post\Post;
use Blog\Comment\Comment;
use Blog\Exception\UserCannotPostException;

class Guest
{
    protected $canPost = true;

    public function commentOn(Post $post, Comment $comment)
    {
        if(!$this->canPost) {
            throw new UserCannotPostException('The user is not allowed to comment on this post');
        }

        $post->addComment($comment);

        return true;
    }

} 