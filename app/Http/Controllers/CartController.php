<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        if (Auth::check()) {

            $userId = Auth::id();
            $productId = $request->input('product_id');

            try {
                $cart = new Cart();
                $cart->user_id = $userId;
                $cart->product_id = $productId;
                $cart->save();
                return redirect()->back()->with('msg', 'Item added to cart!');
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        } else {
            return redirect('/login');
        }

    }


    static function cartItem()
    {
        $userId = Auth::id();
        return Cart::where('user_id', $userId)->count();
    }


    function cartList()
    {

    }


}
