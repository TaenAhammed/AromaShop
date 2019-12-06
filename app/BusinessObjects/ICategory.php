<?php

namespace App\BusinessObjects;

interface ICategory
{
    public function getId();

    public function setId($id);

    public function getName();

    public function setName($name);

}
