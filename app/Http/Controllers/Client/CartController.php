<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cart()
    {
        return view('client.home.cart');
    }
    public function complete()
    {
        return view('client.home.complete');
    }
    public function checkout()
    {
        return view('client.home.checkout');
    }
}
