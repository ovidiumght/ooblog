<?php

use Post\PostType\Page;

class PageTest extends PHPUnit_Framework_TestCase
{
    protected $postType;

    public function setUp()
    {
        $this->postType = new Page();
    }

    public function testItCanPostComments()
    {
        $this->assertFalse($this->postType->canPostComments());
    }

    public function testItGetsTheRightType()
    {
        $this->assertEquals('page',$this->postType->getType());
    }


}
 