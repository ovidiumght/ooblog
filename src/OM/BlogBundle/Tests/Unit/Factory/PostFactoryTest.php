<?php

class PostFactoryTest extends PHPUnit_Framework_TestCase
{

    protected $factory;

    public function setUp()
    {
        $this->factory = new \OM\BlogBundle\Factory\PostFactory();
    }

    public function testItCanCreateFromData()
    {
        $data = array('title'=>'test');
        $factory = new \OM\BlogBundle\Factory\PostFactory();

        $post = $factory->create($data);
        $this->assertInstanceOf('OM\BlogBundle\Post\Post',$post);
    }

    public function testItCanSetRightTitle()
    {
        $data = array('title'=>'title');

        $post = $this->factory->create($data);
        $this->assertInstanceOf('OM\BlogBundle\Post\Post',$post);
        $this->assertEquals('title',$post->getTitle());
    }

    public function testItCanCreateRightType()
    {
        $data = array(
          'title' => 'title',
          'type'  => 'post'
        );

        $post = $this->factory->create($data);
        $this->assertSame($post->getType(),'post');


        $data['type'] = 'page';
        $post = $this->factory->create($data);
        $this->assertSame($post->getType(),'page');

    }
}
 