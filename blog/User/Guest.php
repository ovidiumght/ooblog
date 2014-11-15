<?php

namespace User;

use Post\Post;
use Comment\Comment;
use Exception\UserCannotPostException;

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