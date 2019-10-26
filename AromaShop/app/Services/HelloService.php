<?php

namespace App\Services;

use App\Repositories\IHelloRepository;

class HelloService implements IHelloService
{
    private $_helloRepository;

    public function __construct(IHelloRepository $helloRepository)
    {
        $this->_helloRepository = $helloRepository;
    }

    public function hello()
    {
        $this->_helloRepository->callHelloRepository();
    }
}
