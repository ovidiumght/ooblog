<?php

namespace Blog\Comment;

use Blog\Entity\Entity;
use Blog\Entity\Identity;
use Blog\User\Admin;

class Comment implements Entity
{
    use Identity;

    protected $userId;

    protected $comment;

    protected $approved;

    protected $approvedBy;

    protected $approvedDate;

    public function __construct($comment)
    {
        $this->comment = $comment;

        $this->approved = false;
    }

    public function approve(Admin $admin)
    {
        $this->approvedBy = $admin->getId();
        $this->approvedDate = new \DateTime;
        $this->approved = true;
    }

    public function isApproved()
    {
        return $this->approved;
    }

    public function getComment()
    {
        return $this->comment;
    }
}