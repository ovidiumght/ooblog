<?php
namespace Tests\Unit\User;

use \Post\Post;
use \User\User;
use \Comment\CommentVo;

class UserEntityTest extends \PHPUnit_Framework_TestCase {


    protected $username = 'ovidiu';

    /** @var  \User\User */
    protected $user;

    protected $userId = 10;

    public function setUp()
    {
        $this->user = new \User\User($this->username);
    }

    public function testItCanBeCreated()
    {
        $this->assertEquals($this->username, $this->user->getUsername(), $this->username);
    }

    public function testItCanCommentOnPost()
    {
        $postTitle = 'test_post';
        $comment   = new CommentVo($this->userId,'test_comment');

        $postType = new \Post\PostType\Post();
        $post = new Post($postTitle,$postType);
        $user = new User($this->username);

        $this->assertTrue($user->commentOn($post,$comment));
    }

    /**
     * @expectedException \Exception\UserCannotPostException
     *
     */
    public function testItCannotCommentIfHeIsBlocked()
    {
        $postTitle = 'test_post';
        $comment = 'test_comment';

        $post = new \Post\Post($postTitle, new \Post\PostType\Post());

        $this->user->blockComments();
        $this->user->commentOn($post,$comment);
    }
}
 