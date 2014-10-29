<?php

namespace OM\BlogBundle\Comment;


class CommentVo 
{
    protected $userId;

    protected $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }
} 