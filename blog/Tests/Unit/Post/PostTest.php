<?php

namespace Tests\Unit\Post;

use Comment\CommentVo;
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
        $comment1 = new CommentVo("test_comment 1",$userId);
        $comment2 = new CommentVo("test_comment 2",$userId);

        $this->post->addComment($comment1);
        $this->post->addComment($comment2);

        $this->assertCount(2,$this->post->getComments());
        $this->assertSame(
            array($comment1,$comment2),
            $this->post->getComments()
        );

    }

    /**
     * @expectedException  \Exception\UserCannotPostException
     *
     */
    public function testItCannotAddCommentOnPage()
    {
        $userId = 10;
        $comment1 = new CommentVo("test_comment 1",$userId);

        $this->page->addComment($comment1);

    }

    public function testItCanBePublished()
    {
        $this->post->publish();
        $this->assertEquals(Post::STATUS_PUBLISHED, $this->post->getStatus());
    }
}
