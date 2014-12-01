<?php

namespace Db\DoctrineRepository;

use Doctrine\DBAL\Connection;
use Blog\User\Admin;

class DoctrineUserRepository implements \Blog\Repository\UserRepository
{
    protected $queryBuilder;

    protected $postRepository;

    public function __construct(Connection $queryBuilder) {

        $this->postRepository = new DoctrinePostRepository($queryBuilder);
        $this->queryBuilder = $queryBuilder;

    }

    /**
     * Finds an user by Id
     *
     * @param $userId
     * @return \Blog\User\Admin
     */
    public function findUser($userId)
    {
        $admin = new Admin('testAdmin');
        $admin->setId(10);
        return $admin;

    }

    public function saveUser(\Blog\User\User $user)
    {
        foreach($user->getPosts() as $post) {
            $this->postRepository->savePost($post);
        }
    }

} 