<?php

namespace App\BusinessObjects;


class Price
{
    private $price;
    public $currency;

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        if ($price >= 0) {
            $this->price = $price;
        } else {
            throw new Exception("Price can not be zero.");
        }
    }

    public function getCurrency()
    { }

    public function setCurrency()
    { }
}
