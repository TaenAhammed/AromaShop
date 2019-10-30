<?php

namespace App\BusinessObjects;

class Coupon
{
    private $id;
    private $name;
    private $code;
    private $discount;
    private $validUntil;

    public function getId()
    { }

    public function setId($id)
    { }

    public function getName()
    { }

    public function setName($name)
    { }

    public function getCode()
    { }

    public function setCode($code)
    { }

    public function getDiscount()
    { }

    public function setDiscount($discount)
    { }

    public function getValidUntil()
    { }

    public function setValidUntil($validUntil)
    { }


    public function priceAfterDiscount($cartTotal)
    { }
}
