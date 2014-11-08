<?php

namespace Factory;

use Post\Post;

class PostFactory
{
    public function create($data)
    {
        if(!isset($data['type'])) {
            $data['type'] = 'post';
        }

        if($data['type'] == 'page') {
            $postType = new \Post\PostType\Page();
        }
        else {
            $postType = new \Post\PostType\Post();
        }

        return new Post($data['title'], $postType);
    }
} 