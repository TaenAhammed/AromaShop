<?php

class ProductDescription
{
    private $shortDescription;
    private $LongDescription;

    public function getShortDescriptionLength()
    {
        return strlen($this->shortDescription);
    }

    public function getLongDescriptionLength()
    {
        return strlen($this->LongDescription);
    }
}
