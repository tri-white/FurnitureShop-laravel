<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\User;

class OrderController extends Controller
{
    public function allOrders(){
        $orders= Order::all();
        return view('all-orders')->with('orders', $orders);
    }
    public function order($orderid)
    {
        $order = Order::where('id',$orderid)->first();
        $user = User::where('id',$order->user_id)->first();
        $order_items = OrderItem::where('order_id',$orderid)->get();
        return view('order')->with('order',$order)->with('user',$user)->with('order_items',$order_items);
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
