<?php

namespace Tests\Unit\Post;

use Comment\Comment;
use Post\Post;
use Post\PostType\Page as PagePostType;
use Post\PostType\Post as PostPostType;

class PostEntityTest extends \PHPUnit_Framework_TestCase {

    /** @var  Post */
    protected $post;

    /** @var  Post */
    protected $page;

    protected $postTitle = 'test_blog_title';

    public function setUp()
    {
        $postPostType = new PostPostType();
        $this->post = new Post($this->postTitle,$postPostType);

        $pagePostType = new PagePostType();
        $this->page = new Post($this->postTitle,$pagePostType);
    }

    public function testItCanSetTitle()
    {
        $this->assertEquals($this->postTitle,$this->post->getTitle());
    }

    public function testItCanAddComment()
    {
        $userId = 10;
        $comment1 = new Comment("test_comment 1");
        $comment2 = new Comment("test_comment 2");

        $this->post->addComment($comment1,$userId);
        $this->post->addComment($comment2,$userId);

        $this->assertCount(2,$this->post->getComments());
        $this->assertSame(
            array($comment1,$comment2),
            $this->post->getComments()
        );

    }

    public function testItCannotAddCommentOnPage()
    {
        $this->setExpectedException('\Exception\UserCannotPostException');

        $comment1 = new Comment("test_comment 1");

        $this->page->addComment($comment1);
    }

    public function testItCanBePublished()
    {
        $this->post->publish();
        $this->assertEquals(Post::STATUS_PUBLISHED, $this->post->getStatus());
    }
}
