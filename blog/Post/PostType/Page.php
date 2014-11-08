<?php

namespace Post\PostType;

class Page implements PostType
{
    public function canPostComments()
    {
        return false;
    }

    public function getType()
    {
        return 'page';
    }
}