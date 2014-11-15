<?php

namespace Unit\User;


use Comment\Comment;
use Post\Post;
use Service\CommentService;
use User\Guest;

class GuestTest extends \PHPUnit_Framework_TestCase {

    /** @var  Guest */
    private $guest;

    public function setUp()
    {
        $this->guest = new Guest();
    }

    public function testItCanBeInstantiated()
    {
        $this->assertInstanceOf('User\Guest',$this->guest);
    }

    public function testItReturnsTrueWhenItCommentsOnAPost()
    {
        $post = new Post("test post",new \Post\PostType\Post());

        $result = $this->guest->commentOn($post,new Comment("Test Comment"));

        $this->assertTrue($result);
    }
}
