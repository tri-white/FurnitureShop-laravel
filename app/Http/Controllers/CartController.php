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
        $wish = new Cart;
        $wish->user_id = $userid;
        $wish->product_id = $productid;
        $wish->quantity = 0;
        $wish->save();

        return redirect()->back()->with('success', 'Успішно додано в корзину.');
    }

    public function remove($userid, $productid)
    {
        $cart = Cart::where('user_id', $userid)->where('product_id', $productid)->first();
        $cart->delete();
        return redirect()->back()->with('success', 'Успішно вилучено з корзини');

    }
}
