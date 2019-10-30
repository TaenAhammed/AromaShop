<?php

namespace App\BusinessObjects;

class Address
{
    private $id;
    private $houseNo;
    private $flatNo;
    private $floorNo;
    private $zip;
    private $street;
    private $state;
    private $city;
    private $country;

    public function getId()
    { }

    public function setId($id)
    { }

    public function getHouseNo()
    { }

    public function setHouseNo($houseNo)
    { }

    public function getFlatNo()
    { }

    public function setFlatNo($flatNo)
    { }

    public function getFloorNo()
    { }

    public function setFloorNo($floorNo)
    { }

    public function getZip()
    { }

    public function setZip($zip)
    { }

    public function getStreet()
    { }

    public function setStreet($street)
    { }

    public function getState()
    { }

    public function setState($state)
    { }

    public function getCity()
    { }

    public function setCity($city)
    { }

    public function getCountry()
    { }

    public function setCountry($country)
    { }



    public function getFormattedFullAddress()
    {
        return "{$this->alternativePhone}.\n {$this->houseNo}, {$this->flatNo}, {$this->floorNo}, {$this->zip}.\n {$this->street}, {$this->state}, {$this->city}, {$this->country}";
    }
}
