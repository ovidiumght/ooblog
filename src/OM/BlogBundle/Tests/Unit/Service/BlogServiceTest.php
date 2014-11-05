<?php

class BlogServiceTest extends PHPUnit_Framework_TestCase
{

    protected $userRepository;

    public function setUp()
    {
        $this->userRepository = $this->getMock('\OM\BlogBundle\Repository\UserRepository');
    }

    public function testItCanBeInstantiated()
    {
        $blogService = new \OM\BlogBundle\Service\BlogService($this->userRepository);
        $this->assertInstanceOf('\OM\BlogBundle\Service\BlogService',$blogService);
    }

    public function testItCanWritePost()
    {
        $userId = 10;
        $username = "testusername";
        $data['userId'] = $userId;

        $user = new \OM\BlogBundle\User\User($username);

        $this->userRepository
            ->expects($this->once())
            ->method('findUser')
            ->with($userId)
            ->will($this->returnValue($user));

        $this->userRepository
            ->expects($this->once())
            ->method('saveUser')
            ->with($user);

        $blogService = new \OM\BlogBundle\Service\BlogService($this->userRepository);

        $this->assertTrue($blogService->post($data));
    }

}
 