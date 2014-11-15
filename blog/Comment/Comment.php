<?php

namespace Comment;

use Entity\Entity;
use Entity\Identity;
use User\Admin;

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