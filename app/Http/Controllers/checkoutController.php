<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    //


    public function checkout(){

        $user_id = auth()->user()->id;
        $items = Cart::where('user_id', $user_id)->get();
        $products = Product::all();
        return view('checkout.checkout',\compact('items','products'));

    }
    public function order(Request $request){
        $user_id = auth()->user()->id;
        $items = Cart::where('user_id', $user_id)->get();
        if($items->count() > 0){

            $order = new Order();
            $order->name = $request->name;
            $order->adress = $request->adress;
            $order->phone = $request->phone;
            $order->city = $request->city;
            $order->user_id = $user_id ;
            $order->save();

            //store ordered items

            foreach ($items as $item){
                    OrderItems::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'qty' => $item->qty,
                    ]);
            }
            if(Auth::user()->phone == NULL){
                $user = User::find($user_id);
                $user->adress = $request->adress;
                $user->phone = $request->phone;
                $user->update();
            }
            //clear User Cart
            $items = Cart::where('user_id', $user_id)->delete();
            $items = Cart::where('user_id', $user_id)->get();

            return \redirect()->back()->with([
                'success' => 'Your Order has been passed successfully',
                'items' => $items
                ]);

        }else{
            return \redirect()->back()->with(['success' => 'Your cart is empty']);
        }
    }
}
