<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        $userId = Auth::id();
        $user = User::find($userId);
        $images = Product_image::all();
        // we will make join with product id to get item info
        $itemsList = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select('products.*', 'carts.id as cart_id')
            ->get();

        return view('pages.cartlist', ['itemsList' => $itemsList, 'images' => $images, 'user' => $user]);
    }


    function removeItem($id)
    {
        Cart::destroy($id);
        return redirect('/cartlist');
    }
}
