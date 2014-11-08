<?php

namespace Tests\Unit\Post\PostType;

use Post\PostType\Page;
use Post\PostType\PostType;


class PageTest extends \PHPUnit_Framework_TestCase
{
    /** @var  PostType */
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
 