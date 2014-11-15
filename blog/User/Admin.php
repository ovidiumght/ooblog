<?php

namespace User;

use Comment\Comment;
use Exception\CannotBlockAdminComments;
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

    public function commentOn($post,$comment)
    {
        parent::commentOn($post,$comment);
        $this->approve($comment);
    }

    public function blockComments()
    {
        throw new CannotBlockAdminComments('You cannot block an admin\'s comments');
    }

    public function approve(Comment $comment)
    {
        $comment->approve($this);
    }
}