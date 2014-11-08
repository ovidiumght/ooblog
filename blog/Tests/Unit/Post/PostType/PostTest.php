<?php

use Post\PostType\Post;

class PostTest extends PHPUnit_Framework_TestCase
{
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
 