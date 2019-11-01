<?php

namespace App\Http\Controllers;

use App\Services\IHelloService;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(IHelloService $helloService)
    {
        $helloService->hello();
    }
}
