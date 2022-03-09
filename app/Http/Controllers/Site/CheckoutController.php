<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function index()
    {
        $cart = Cart::instance('shopping');
        return view('frontend.checkout.index',compact('cart'));
    }

    public function newUser(Request $request)
    {
        dd($request->all());
    }
}
