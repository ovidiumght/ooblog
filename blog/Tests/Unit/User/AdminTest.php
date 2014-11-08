<?php

namespace Tests\Unit\User;

use Comment\CommentVo;
use Post\Post;
use User\Admin;
use User\User;

class AdminTest extends \PHPUnit_Framework_TestCase
{

    const POST_TITLE = "TEST POST TITLE";

    /** @var  Admin */
    protected $admin;

    public function setUp()
    {
        $this->admin = new Admin('test_username');
    }

    /**
     * @expectedException \Exception\UserCannotPostException
     */
    public function testItCanBlockUserComments()
    {
        $postType = new \Post\PostType\Post();
        $user = new User('bad_user');
        $post = new Post('Test Post',$postType);

        $this->admin->blockUserComments($user);

        $user->commentOn($post, new CommentVo(10,'test_comment'));
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
 