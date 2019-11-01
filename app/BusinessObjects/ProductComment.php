<?php

namespace App\BusinessObjects;

class ProductComment
{

    public $fullName;
    public $email;
    public $phoneNumber;
    public $message;
    public $isPublished = false;

    public function getFullName()
    { }

    public function setFullYear($year)
    { }

    public function getEmail()
    { }

    public function setEmail($email)
    { }

    public function getPhoneNumber()
    { }

    public function setPhoneNumber($email)
    { }

    public function getMessage()
    { }

    public function setMessage($message)
    { }



    public function changeStatus()
    {
        $this->isPublished = !$this->isPublished;;
    }
}
