<?php

namespace OM\BlogBundle\Post;

use OM\BlogBundle\Comment\CommentVo;
use OM\BlogBundle\Exception\UserCannotPostException;
use OM\BlogBundle\Post\PostType\PostType;

class Post
{
    protected $title;

    protected $comments;

    protected $postType;

    public function __construct($title, PostType $postType)
    {
        $this->title = $title;

        $this->postType = $postType;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function addComment($userId,CommentVo $comment)
    {
        if($this->postType->canPostComments()) {
            $this->comments[] = $comment;
        }
        else {
            throw new UserCannotPostException();
        }
    }

    public function getComments()
    {
        return $this->comments;
    }
}