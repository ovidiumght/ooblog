<?php
namespace Tests\Unit\User;

use \Blog\Post\Post;
use \Blog\User\User;
use \Blog\Comment\Comment;

class UserEntityTest extends \PHPUnit_Framework_TestCase {

    const POST_TITLE = "TEST POST TITLE";
    const USER_ID = 10;

    protected $username = 'test_username';

    /** @var  \Blog\User\User */
    protected $user;

    public function setUp()
    {
        $this->user = new User($this->username);
    }

    public function testItCanBeCreated()
    {
        $this->assertEquals($this->username, $this->user->getUsername(), $this->username);
    }

    public function testItCanCommentOnPost()
    {
        $comment   = new Comment('test_comment');

        $postType = new \Blog\Post\PostType\Post();
        $post = new Post(self::POST_TITLE,$postType);
        $user = new User($this->username);

        $this->assertTrue($user->commentOn($post,$comment));
    }

    public function testItCannotCommentIfHeIsBlocked()
    {
        $this->setExpectedException('\Blog\Exception\UserCannotPostException');

        $comment = new Comment('test_comment');


        $post = new Post(self::POST_TITLE, new \Blog\Post\PostType\Post());

        $this->user->blockComments();
        $this->user->commentOn($post,$comment);
    }

    public function testItHasId()
    {
        $this->user->setId(self::USER_ID);
        $this->assertSame(self::USER_ID,$this->user->getId());
    }

}
 