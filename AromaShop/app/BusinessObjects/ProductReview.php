<?php

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
}
