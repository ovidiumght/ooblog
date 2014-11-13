<?php

namespace Post;

use Comment\CommentVo;
use Exception\UserCannotPostException;
use Post\PostType\PostType;

class Post
{
    const STATUS_PUBLISHED = 'published';
    const STATUS_DRAFT = 'draft';

    protected $title;

    protected $comments;

    protected $postType;

    protected $status;

    public function __construct($title, PostType $postType)
    {
        $this->title = $title;

        $this->postType = $postType;
    }

    public function publish()
    {
        $this->status = self::STATUS_PUBLISHED;
    }

    public function addComment(CommentVo $comment)
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

    public function getTitle()
    {
        return $this->title;
    }

    public function getType()
    {
        return $this->postType->getType();
    }

    public function getStatus()
    {
        return $this->status;
    }
}