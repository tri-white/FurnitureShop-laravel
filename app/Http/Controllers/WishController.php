<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wish;
class WishController extends Controller
{
    public function index($userid)
    {
        $wishes = Wish::where('user_id', $userid)->get();
        return view('wishlist', ['wishes' => $wishes]);
    }

    public function add($userid, $productid)
    {
            $wish = new Wish;
            $wish->user_id = $userid;
            $wish->product_id = $productid;
            $wish->save();

            return redirect()->back()->with('success', 'Успішно додано в список побажань.');
    }

    public function remove($userid, $productid)
    {
            $wish = Wish::where('user_id', $userid)->where('product_id', $productid)->first();
                $wish->delete();
                return redirect()->back()->with('success', 'Успішно вилучено з списку побажань');

    }
}
