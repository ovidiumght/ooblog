<?php

namespace Entity;


trait Identity {

    protected $id;

    public function getId()
    {
        return $this->id;
    }
} 