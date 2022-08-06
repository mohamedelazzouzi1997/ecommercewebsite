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
        if(auth()->check()){
            $cart = Cart::where('user_id',auth()->user()->id)->get();
        }
        $product = Product::find($id);
        $product_category = Category::where('id',$product->id)->first();

        $product_by_same_categorys = Product::where('category_id',$product_category->id)->get()->random(3)->values();

        return view('product.single_product',compact('product','cart','product_category','product_by_same_categorys'));
    }

    public function getProductByCategory($name){

        if(auth()->check()){
            $cart = Cart::where('user_id',auth()->user()->id)->get();
        }

        $category = Category::where('name',$name)->first();

        $products = Product::where('category_id',$category->id)->get();

        return view('index',compact('products','cart'));
    }
}
