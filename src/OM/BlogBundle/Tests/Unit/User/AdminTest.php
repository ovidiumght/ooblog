<?php

namespace OM\BlogBundle\Tests\Unit\User;

use OM\BlogBundle\Comment\CommentVo;
use OM\BlogBundle\Post\Post;
use OM\BlogBundle\User\Admin;
use OM\BlogBundle\User\User;

class AdminTest extends \PHPUnit_Framework_TestCase
{

    protected $admin;

    public function setUp()
    {
        $this->admin = new Admin('ovidiu');
    }

    /**
     * @expectedException \OM\BlogBundle\Exception\UserCannotPostException
     */
    public function testItCanBlockUserComments()
    {
        $postType = new \OM\BlogBundle\Post\PostType\Post();
        $user = new User('bad_user');
        $post = new Post('Test Post',$postType);

        $this->admin->blockUserComments($user);

        $user->commentOn($post, new CommentVo(10,'test_comment'));
    }

    public function testItReturnsTrueWhenItWritesAPost()
    {
        $postType = new \OM\BlogBundle\Post\PostType\Post();
        $this->assertTrue($this->admin->writePost('content',$postType));
    }

    public function testItCanWriteAPost()
    {
        $postType = new \OM\BlogBundle\Post\PostType\Post();
        $this->admin->writePost('content',$postType);


    }

}
 