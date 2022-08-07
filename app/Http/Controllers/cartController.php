<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    //

    public function show(){

        $user_id = auth()->user()->id;
        $items = Cart::where('user_id', $user_id)->get();
        return view('cart.cart',\compact('items'));
    }

        public function addProductToCart($id){
            if(Auth::check()){
                $cart = new Cart();
                $cart->product_id = $id;
                $cart->user_id = auth()->user()->id;
                $cart->save();
                return \redirect()->back();
            }else{
                return \redirect()->route('login');
            }

    }

        public function addProductToCartajax(Request $request){

            if(auth()->check()){
                $cart = Cart::where('user_id',auth()->user()->id)->get();
            }
            if($cart->where('product_id', $request->product_id)->count()){
                 return response()->json(['status'=>'faile to store']);
            }else{
                $cart = new Cart();
                if($request->has('qty')){
                    $cart->qty = $request->qty;
                }
                $cart->product_id = $request->product_id;
                $cart->user_id = auth()->user()->id;
                $cart->save();
            return response()->json(['status'=>'success to store']);
            }

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
