<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;

class OrderController extends Controller
{
    public function allOrders(){
        return redirect()->back();
    }
    public function placeOrder(Request $request, $userid)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]+$/',
        ]);

        $order = new Order();
        $order->user_id = $userid;
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->save();

        $orderID = $order->id;

        $items = Cart::where('user_id', $userid)->get();

        foreach ($items as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->product_id;
            $orderItem->quantity = $item->quantity;
            $orderItem->order_id = $orderID;
            $orderItem->save();
        }
        
        Cart::where('user_id', $userid)->delete();

        return redirect()->back()->with('success', 'Замовлення успішно розміщено');
    }

}
