<?php

namespace Tests\Unit\User;

use Comment\Comment;
use Post\Post;
use User\Admin;
use User\User;

class AdminTest extends \PHPUnit_Framework_TestCase
{

    const POST_TITLE = "TEST POST TITLE";
    const ADMIN_USERNAME = "test_username";
    const OTHER_ADMIN_USERNAME = "other_test_username";

    /** @var  Admin */
    protected $admin;

    public function setUp()
    {
        $this->admin = new Admin(self::ADMIN_USERNAME);
    }

    public function testItCanBlockUserComments()
    {
        $this->setExpectedException('\Exception\UserCannotPostException');

        $postType = new \Post\PostType\Post();
        $user = new User('bad_user');
        $post = new Post('Test Post',$postType);

        $this->admin->blockUserComments($user);

        $user->commentOn($post, new Comment('test_comment'));
    }

    public function testItCannotBlockAdminComments()
    {
        $this->setExpectedException('\Exception\CannotBlockAdminComments');

        $otherAdmin = new Admin(self::OTHER_ADMIN_USERNAME);
        $this->admin->blockComments($otherAdmin);
    }

    public function testItCanWritePost()
    {
        $post = $this->writePost(self::POST_TITLE);

        $this->assertCount(1,$this->admin->getPosts());
        $this->assertSame(array($post), $this->admin->getPosts());

    }

    public function testItCanCountPosts()
    {
        $this->assertEmpty($this->admin->getPosts());

        $this->writePost(self::POST_TITLE);
        $this->writePost(self::POST_TITLE);

        $this->assertEquals(2,$this->admin->getPostsCount());

    }

    public function testItCanApproveComments()
    {
        $comment = new Comment("Test Comment");

        $this->admin->approve($comment);

        $this->assertTrue($comment->isApproved());
    }

    public function testThatAdminCommentsAreApprovedByDefault()
    {
        $comment = new Comment("Test Comment");
        $post    = new Post('Test title',new \Post\PostType\Post());

        $this->admin->commentOn($post,$comment);

        $this->assertTrue($comment->isApproved());
    }

    /**
     * @param $postTitle
     * @return Post
     */
    protected function writePost($postTitle)
    {
        $post = new Post($postTitle, new \Post\PostType\Post());
        $this->admin->write($post);
        return $post;
    }



}
 