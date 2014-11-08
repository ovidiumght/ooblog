<?php
namespace Tests\Unit\Comment;


class CommentVoTest extends \PHPUnit_Framework_TestCase
{

    public function testItCanBeCreatedAndHasAllPieces()
    {
        $commentText = "Test Comment";
        $comment = new \Comment\CommentVo($commentText);
        $this->assertEquals($commentText,$comment->getComment());
    }
}
 