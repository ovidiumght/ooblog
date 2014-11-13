<?php

namespace Comment;


class CommentVo 
{
    protected $userId;

    protected $comment;

    public function __construct($comment, $userId)
    {
        $this->comment = $comment;

        $this->userId = $userId;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}