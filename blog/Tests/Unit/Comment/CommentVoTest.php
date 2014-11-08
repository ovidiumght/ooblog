<?php
namespace Tests\Unit\Comment;

use Comment\CommentVo;

class CommentVoTest extends \PHPUnit_Framework_TestCase
{

    public function testItCanBeCreatedAndHasAllPieces()
    {
        $commentText = "Test Comment";
        $comment = new CommentVo($commentText);
        $this->assertEquals($commentText,$comment->getComment());
    }
}
 