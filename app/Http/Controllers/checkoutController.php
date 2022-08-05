<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class checkoutController extends Controller
{
    //


    public function checkout(){

        $user_id = auth()->user()->id;
        $items = Cart::where('user_id', $user_id)->get();
        $products = Product::all();
        return view('checkout.checkout',\compact('items','products'));

    }
}
