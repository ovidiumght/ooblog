<?php

namespace OM\BlogBundle\Factory;

use OM\BlogBundle\Post\Post;

class PostFactory
{

    public function create($data)
    {
        if(!isset($data['type'])) {
            $data['type'] = 'post';
        }

        if($data['type'] == 'page') {
            $postType = new \OM\BlogBundle\Post\PostType\Page();
        }
        else {
            $postType = new \OM\BlogBundle\Post\PostType\Post();
        }

        return new Post($data['title'], $postType);
    }
} 