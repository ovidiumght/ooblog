<?php

namespace Tests\Unit\Service;

use Service\PostService;

class PostServiceTest extends \PHPUnit_Framework_TestCase
{

    protected $userRepository;

    protected $postRepository;

    public function setUp()
    {
        $this->userRepository = $this->getMock('\Repository\UserRepository');
        $this->postRepository = $this->getMock('\Repository\PostRepository');
    }

    public function testItCanBeInstantiated()
    {
        $postService = new PostService($this->postRepository, $this->userRepository);
        $this->assertInstanceOf('\Service\PostService',$postService);
    }

    public function testItCanWritePost()
    {
        $userId = 10;
        $username = "test_username";
        $data['userId'] = $userId;
        $data['title']  = 'Test Post';

        $user = new \User\Admin($username);

        $this->userRepository
            ->expects($this->once())
            ->method('findUser')
            ->with($userId)
            ->will($this->returnValue($user));

        $this->userRepository
            ->expects($this->once())
            ->method('saveUser')
            ->with($user);


        $blogService = new \Service\PostService($this->postRepository,$this->userRepository);

        $this->assertTrue($blogService->writePost($data));
    }

}
 