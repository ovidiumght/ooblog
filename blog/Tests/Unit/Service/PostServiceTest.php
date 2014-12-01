<?php

namespace Tests\Unit\Service;

use Blog\Service\PostService;

class PostServiceTest extends \PHPUnit_Framework_TestCase
{

    protected $userRepository;

    protected $postRepository;

    public function setUp()
    {
        $this->userRepository = $this->getMock('\Blog\Repository\UserRepository');
        $this->postRepository = $this->getMock('\Blog\Repository\PostRepository');
    }

    public function testItCanBeInstantiated()
    {
        $postService = new PostService($this->postRepository, $this->userRepository);
        $this->assertInstanceOf('\Blog\Service\PostService',$postService);
    }

    public function testItCanWritePost()
    {
        $userId = 10;
        $username = "test_username";
        $data['userId'] = $userId;
        $data['title']  = 'Test Post';

        $user = new \Blog\User\Admin($username);

        $this->userRepository
            ->expects($this->once())
            ->method('findUser')
            ->with($userId)
            ->will($this->returnValue($user));

        $this->userRepository
            ->expects($this->once())
            ->method('saveUser')
            ->with($user);


        $blogService = new \Blog\Service\PostService($this->postRepository,$this->userRepository);

        $this->assertTrue($blogService->writePost($data));
    }

}
 