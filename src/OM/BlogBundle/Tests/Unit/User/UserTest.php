<?php
namespace OM\BlogBundle\Tests\Unit\User;

use \OM\BlogBundle\Post\Post;
use \OM\BlogBundle\User\User;
use \OM\BlogBundle\Comment\CommentVo;

class UserEntityTest extends \PHPUnit_Framework_TestCase {


    protected $username = 'ovidiu';

    /** @var  \OM\BlogBundle\User\User */
    protected $user;

    protected $userId = 10;

    public function setUp()
    {
        $this->user = new \OM\BlogBundle\User\User($this->username);
    }

    public function testItCanBeCreated()
    {
        $this->assertEquals($this->username, $this->user->getUsername(), $this->username);
    }

    public function testItCanCommentOnPost()
    {
        $postTitle = 'test_post';
        $comment   = new CommentVo($this->userId,'test_comment');

        $postType = new \OM\BlogBundle\Post\PostType\Post();
        $post = new Post($postTitle,$postType);
        $user = new User($this->username);

        $this->assertTrue($user->commentOn($post,$comment));
    }

    /**
     * @expectedException \OM\BlogBundle\Exception\UserCannotPostException
     *
     */
    public function testItCannotCommentIfHeIsBlocked()
    {
        $postTitle = 'test_post';
        $comment = 'test_comment';

        $post = new \OM\BlogBundle\Post\Post($postTitle, new \OM\BlogBundle\Post\PostType\Post());

        $this->user->blockComments();
        $this->user->commentOn($post,$comment);
    }
}
 