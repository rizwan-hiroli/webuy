<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $data = [   
                    'product_id'=>$request->product_id,
                    'user_id'=>auth()->user()->id
                ];

        Cart::insert($data);

        return response()->json(['success'=>'Added to cart.'], 200);

    }

    public function removeFromCart(Request $request)
    {
        $data = [   
                    'product_id'=>$request->product_id,
                    'user_id'=>auth()->user()->id
                ];

        Cart::where($data)->delete();

        return response()->json(['success'=>'Removed from cart.'], 200);

    }

    public function cart()
    {
        $carts = Cart::join('products','products.id','=','carts.product_id')
                        ->where('user_id',auth()->user()->id)->get();

        return view('cart',compact('carts'));

    }

}
