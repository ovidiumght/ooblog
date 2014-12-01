<?php

namespace Unit\Service;

use Blog\Post\Post;
use Blog\Repository\PostRepository;
use Blog\Repository\UserRepository;
use Blog\Service\CommentService;
use Blog\User\Guest;
use Blog\User\User;

class CommentServiceTest extends \PHPUnit_Framework_TestCase
{
    const USER_ID = 10;
    const POST_ID = 20;
    const GUEST_ID = null;

    /** @var  CommentService */
    protected $commentService;

    /** @var  PostRepository | \PHPUnit_Framework_MockObject_MockObject */
    protected $postRepository;

    /** @var  UserRepository | \PHPUnit_Framework_MockObject_MockObject */
    protected $userRepository;

    /** @var  Post */
    protected $post;

    protected $user;

    protected $guest;

    protected $data = array();

    public function setUp()
    {
        $this->user = new User('testuser');
        $this->post = new Post('testpost',new \Blog\Post\PostType\Post());

        $this->guest = new Guest();

        $this->postRepository = $this->getMock('\Blog\Repository\PostRepository');
        $this->userRepository = $this->getMock('\Blog\Repository\UserRepository');

        $this->commentService = new CommentService($this->postRepository,$this->userRepository);

        $this->data = array(
            'userId' => self::USER_ID,
            'postId' => self::POST_ID,
            'comment' => 'Test Comment'
        );

        $this->seedPostRepository();
    }


    public function testItReturnsTrueWhenYouCommentOnPost()
    {
        $this->seedUserRepositoryWithUser();

        $this->assertTrue($this->comment());
        $this->assertSame('Test Comment',$this->post->getComments()[0]->getComment());
    }

    public function testItHasCommentCountWhenYouCommentOnPost()
    {
        $this->seedUserRepositoryWithUser();

        $this->comment();
        $this->assertCount(1,$this->post->getComments());
    }

    public function testItHasTheCommentThatWasAdded()
    {
        $this->seedUserRepositoryWithUser();

        $this->comment();
        $this->assertSame('Test Comment',$this->post->getComments()[0]->getComment());
    }

    public function testGuestsCanComment()
    {
        $this->seedUserRepositoryWithGuest();
        $this->data['userId'] = self::GUEST_ID;

        $this->comment();

        $this->assertSame('Test Comment',$this->post->getComments()[0]->getComment());

    }


    protected function comment()
    {
        return $this->commentService->comment($this->data);
    }

    protected function seedUserRepositoryWithUser() {

        $this->userRepository
            ->expects($this->once())
            ->method('findUser')
            ->with(self::USER_ID)
            ->will($this->returnValue($this->user));
    }

    protected function seedUserRepositoryWithGuest() {
        $this->userRepository
            ->expects($this->once())
            ->method('findUser')
            ->with(self::GUEST_ID)
            ->will($this->returnValue($this->guest));

    }

    protected function seedPostRepository()
    {
        $this->postRepository
            ->expects($this->once())
            ->method('findPost')
            ->with(self::POST_ID)
            ->will($this->returnValue($this->post));
    }
}
 