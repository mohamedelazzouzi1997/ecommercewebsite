<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class cartController extends Controller
{
    //

    public function show(){

        $user_id = auth()->user()->id;
        $items = Cart::where('user_id', $user_id)->get();
        return view('cart.cart',\compact('items'));
    }

        public function addProductToCart($id){

            $cart = new Cart();
            $cart->product_id = $id;
            $cart->user_id = auth()->user()->id;
            $cart->save();

        return \redirect()->back();
    }

        public function deleteProductFromCart($id){

            $cart = Cart::find($id);
            $cart->delete();

        return \redirect()->back()->with(['success' => 'le produit a été supprimé']);
    }

        public function updateQtyProductCart(Request $request,$id){
            if($request->qty < 1){
                return \redirect()->back()->with(['success' => 'la quantité et invalide']);
            }else{

                $cart = Cart::find($id);
                $cart->qty = $request->qty;
                $cart->update();
            }

        return \redirect()->back()->with(['success' => 'la quantité de produit a été modfier']);
    }


}
