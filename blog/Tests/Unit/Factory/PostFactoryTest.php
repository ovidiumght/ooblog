<?php

namespace Blog\Tests\Unit\Factory;

class PostFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \Blog\Factory\PostFactory */
    protected $factory;

    public function setUp()
    {
        $this->factory = new \Blog\Factory\PostFactory();
    }

    public function testItCanCreateFromData()
    {
        $data = array('title'=>'test');
        $factory = new \Blog\Factory\PostFactory();

        $post = $factory->create($data);
        $this->assertInstanceOf(\Blog\Post\Post::class,$post);
    }

    public function testItCanSetRightTitle()
    {
        $data = array('title'=>'title');

        $post = $this->factory->create($data);
        $this->assertInstanceOf(\Blog\Post\Post::class,$post);
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
 