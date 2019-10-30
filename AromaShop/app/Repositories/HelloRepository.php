<?php

namespace App\Repositories;


class HelloRepository implements IHelloRepository
{
    public function callHelloRepository()
    {
        echo "Hello";
    }
}
