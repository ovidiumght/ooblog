<?php

namespace Tests\Unit\User;

use Comment\CommentVo;
use Post\Post;
use User\Admin;
use User\User;

class AdminTest extends \PHPUnit_Framework_TestCase
{

    protected $admin;

    public function setUp()
    {
        $this->admin = new Admin('ovidiu');
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

    public function testItReturnsTrueWhenItWritesAPost()
    {
        $postType = new \Post\PostType\Post();
        $this->assertTrue($this->admin->writePost('content',$postType));
    }

    public function testItCanWriteAPost()
    {
        $postType = new \Post\PostType\Post();
        $this->admin->writePost('content',$postType);


    }

}
 