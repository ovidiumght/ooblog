<?php

namespace Blog\Tests\Unit\Post\PostType;

use Blog\Post\PostType\Post;
use Blog\Post\PostType\PostType;

class PostTest extends \PHPUnit_Framework_TestCase
{
    /** @var  PostType */
    protected $postType;

    public function setUp()
    {
        $this->postType = new Post();
    }

    public function testItCanPostComments()
    {
        $this->assertTrue($this->postType->canPostComments());
    }

    public function testItGetsTheRightType()
    {
        $this->assertEquals('post',$this->postType->getType());
    }
}
 