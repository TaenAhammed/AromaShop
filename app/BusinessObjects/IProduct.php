<?php

namespace App\BusinessObjects;

interface IProduct
{
    public function getId();

    public function setId($id);

    public function getName();

    public function setName($name);

    public function getImage();

    public function setImage($image);

    public function getPrice();

    public function setPrice($price);

    public function getCategory();

    public function setCategory($category);

    public function getDiscount();

    public function setDiscount($discount);

    public function priceAfterDiscount();
}
