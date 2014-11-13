<?php
namespace Tests\Unit\Comment;

use Comment\CommentVo;

class CommentVoTest extends \PHPUnit_Framework_TestCase
{

    public function testItCanBeCreatedAndHasAllPieces()
    {
        $userId = 10;
        $commentText = "Test Comment";
        $comment = new CommentVo($commentText,$userId);

        $this->assertEquals($commentText,$comment->getComment());
        $this->assertEquals($userId,$comment->getUserId());
    }
}
 