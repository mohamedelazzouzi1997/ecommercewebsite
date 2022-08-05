<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class productController extends Controller
{
    //


    public function index() {

        $cart ='';
    $products = Product::all();
    if(auth()->check()){
        $cart = Cart::where('user_id',auth()->user()->id)->get();
    }

    return view('index',compact('products','cart'));
    }

    public function show($id){
        $product = Product::find($id);

        return view('product.single_product',compact('product'));
    }

    public function getProductByCategory($name){

        $category = Category::where('name',$name)->first();

        $products = Product::where('category_id',$category->id)->get();

        return view('index',compact('products'));
    }
}
