<?php

namespace App\BusinessObjects;

class ProductDescription
{
    private $shortDescription;
    private $LongDescription;

    public function getShortDescription()
    { }

    public function setShortDescription($description)
    { }

    public function getLongDescription()
    { }

    public function setLongDescription($description)
    { }



    public function getShortDescriptionLength()
    {
        return strlen($this->shortDescription);
    }

    public function getLongDescriptionLength()
    {
        return strlen($this->LongDescription);
    }
}
