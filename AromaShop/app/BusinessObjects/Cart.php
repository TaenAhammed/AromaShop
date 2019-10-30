<?php

namespace App\BusinessObjects;

class Cart
{
    private $id;
    private $cartItems;
    private $coupon;
    private $totalAmount;

    public function getId()
    { }

    public function setId($id)
    { }

    public function getCoupon()
    { }

    public function setCoupon($coupon)
    { }



    public function applyCoupon($coupon)
    { }

    public function getTotalAmount()
    {
        return $this->totalAmount();
    }

    public function addCartItem()
    { }

    public function removeCartItem()
    { }
}
