<?php

namespace Blog\Tests\Unit\User;

use Blog\Comment\Comment;
use Blog\Post\Post;
use Blog\User\Guest;

class GuestTest extends \PHPUnit_Framework_TestCase {

    /** @var  Guest */
    private $guest;

    public function setUp()
    {
        $this->guest = new Guest();
    }

    public function testItCanBeInstantiated()
    {
        $this->assertInstanceOf('Blog\User\Guest',$this->guest);
    }

    public function testItReturnsTrueWhenItCommentsOnAPost()
    {
        $post = new Post("test post",new \Blog\Post\PostType\Post());

        $result = $this->guest->commentOn($post,new Comment("Test Comment"));

        $this->assertTrue($result);
    }
}
