<?php

namespace Blog\Factory;

use Blog\Post\Post;

class PostFactory
{
    public function create($data)
    {
        if(!isset($data['type'])) {
            $data['type'] = 'post';
        }

        if($data['type'] == 'page') {
            $postType = new \Blog\Post\PostType\Page();
        }
        else {
            $postType = new \Blog\Post\PostType\Post();
        }

        return new Post($data['title'], $postType);
    }
} 