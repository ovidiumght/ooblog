<?php

namespace Blog\Post\PostType;


interface PostType
{
    public function canPostComments();

    public function getType();
} 