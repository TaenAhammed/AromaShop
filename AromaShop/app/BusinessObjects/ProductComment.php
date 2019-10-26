<?php

class ProductComment
{

    public $fullName;
    public $email;
    public $phoneNumber;
    public $message;
    public $isPublished = false;

    public function changeStatus()
    {
        $this->isPublished = !$this->isPublished;;
    }
}
