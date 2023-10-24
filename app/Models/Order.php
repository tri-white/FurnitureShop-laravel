<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public static function getSum($orderId)
    {
        $order = self::find($orderId);

        if (!$order) {
            return 0;
        }

        $orderItems = $order->orderItems;

        $totalSum = 0;

        foreach ($orderItems as $orderItem) {
            $product = Product::where('id',$orderItem->product_id)->first();
            $totalSum += $product->price * $orderItem->quantity;
        }

        return $totalSum;
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
