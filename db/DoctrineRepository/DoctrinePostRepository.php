<?php

namespace Db\DoctrineRepository;

use \Blog\Repository\PostRepository;
use \Doctrine\DBAL\Connection;
use \Blog\Post\Post;

class DoctrinePostRepository implements PostRepository
{
    protected $queryBuilder;

    public function __construct(Connection $queryBuilder) {

        $this->queryBuilder = $queryBuilder;

    }

    public function findPost($postId)
    {
        // TODO: Implement findPost() method.
    }

    public function savePost(Post $post)
    {
        echo $this->queryBuilder
            ->insert('post',
                array(
                    'title'  => $post->getTitle(),
                    'type'   => $post->getType(),
                    'status' => $post->getStatus()
                )
            );
    }
}