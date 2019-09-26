<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('layouts.home.home');
    }

    public function category()
    {
        return view('layouts.shop.category');
    }

    public function product()
    {
        return view('layouts.shop.product');
    }

    public function checkout()
    {
        return view('layouts.shop.checkout');
    }

    public function confirmation()
    {
        return view('layouts.shop.confirmation');
    }

    public function cart()
    {
        return view('layouts.shop.cart');
    }

    public function blog()
    {
        return view('layouts.blog.blog');
    }

    public function post()
    {
        return view('layouts.blog.post');
    }

    public function login()
    {
        return view('layouts.login');
    }

    public function register()
    {
        return view('layouts.register');
    }

    public function tracking()
    {
        return view('layouts.shop.tracking');
    }

    public function contact()
    {
        return view('layouts.contact');
    }
}
