<?php

namespace OM\BlogBundle\Post\PostType;


interface PostType
{
    public function canPostComments();

    public function getType();
} 