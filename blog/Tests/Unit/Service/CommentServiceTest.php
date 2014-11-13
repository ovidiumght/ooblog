<?php

namespace Unit\Service;

use Service\CommentService;

class CommentServiceTest extends \PHPUnit_Framework_TestCase
{
    protected $commentService;

    protected $postRepository;

    protected $userRepository;

    public function setUp()
    {
        $this->postRepository = $this->getMock('\Repository\PostRepository');
        $this->userRepository = $this->getMock('\Repository\UserRepository');

        $this->commentService = new CommentService($this->postRepository,$this->userRepository);
    }

    public function testItCanCommentOnPost()
    {
        $data = array(
            'userId' => 10,
            'postId' => 10,
            'comment' => 'Test Comment'
        );

        $this->assertTrue($this->commentService->comment($data));
    }
}
 