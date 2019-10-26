<?php

class Product
{
    private $image;
    private $name;
    private $price;
    private $category;
    private $discount;

    public function getImage()
    { }

    public function setImage()
    { }

    public function getName()
    { }

    public function setName()
    { }

    public function getCategory()
    { }

    public function setCategory()
    { }

    public function getDiscount()
    { }

    public function setDiscount()
    { }

    public function applyDiscount($discount)
    {
        $this->price * $discount;
    }

    public function getPrice()
    { }

    public function setPrice()
    { }
}
