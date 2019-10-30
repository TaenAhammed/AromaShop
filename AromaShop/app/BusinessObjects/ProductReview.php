<?php

namespace App\BusinessObjects;

class ProductReview
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $star;
    public $isPublished = false;

    public function changeStatus()
    {
        $this->isPublished = !$this->isPublished;;
    }

    public function setName()
    { }

    public function getName()
    { }

    public function getEmail()
    { }

    public function setEmail()
    { }

    public function getSubject()
    { }

    public function setSubject()
    { }

    public function getMessage()
    { }

    public function setMessage()
    { }

    public function getStar()
    { }

    public function setStar()
    { }
}
