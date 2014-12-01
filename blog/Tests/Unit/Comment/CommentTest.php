<?php
namespace Blog\Tests\Unit\Comment;

use Blog\Comment\Comment;
use Blog\User\Admin;

class CommentTest extends \PHPUnit_Framework_TestCase
{
    const COMMENT_TEXT = "Test Comment";

    /** @var  Comment */
    protected $comment;

    public function setUp()
    {
        $this->comment = new Comment(self::COMMENT_TEXT);
    }

    public function testItCanBeCreatedAndHasAllPieces()
    {
        $this->assertEquals(self::COMMENT_TEXT,$this->comment->getComment());
    }

    public function testItIsUnapprovedWhenCreated()
    {
        $this->assertFalse($this->comment->isApproved());
    }

    public function testItCanBeApproved()
    {
        $admin = new Admin('admin');
        $this->comment->approve($admin);
        $this->assertTrue($this->comment->isApproved());
    }
}
 