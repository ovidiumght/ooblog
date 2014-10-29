<?php

use OM\BlogBundle\Post\PostType\Post;

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


}
 