<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index($userid)
    {
        $items = Cart::where('user_id', $userid)->get();
        return view('cart', ['items' => $items]);
    }

    public function add(Request $request, $userid, $productid)
    {
        $existingCartItem = Cart::where('user_id', $userid)
                                ->where('product_id', $productid)
                                ->first();

        if ($existingCartItem) {
            return redirect()->back()->with('error', 'Предмет вже знаходиться в корзині.');
        } else {
            $cartItem = new Cart;
            $cartItem->user_id = $userid;
            $cartItem->product_id = $productid;
            $cartItem->quantity = $request->input('quantity');
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Успішно додано в корзину.');
    }

    public function remove($userid, $productid)
    {
        $cart = Cart::where('user_id', $userid)->where('product_id', $productid)->first();
        $cart->delete();
        return redirect()->back()->with('success', 'Успішно вилучено з корзини');
    }
}
