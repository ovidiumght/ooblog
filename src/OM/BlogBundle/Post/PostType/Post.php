<?php

namespace OM\BlogBundle\Post\PostType;

class Post implements PostType
{
    public function canPostComments()
    {
        return true;
    }

    public function getType()
    {
        return 'post';
    }
}