<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('shop', ['products'=>$products]);
    }
    public function add(){
        return redirect()->back();
    }
    public function search(){
        return redirect()->back();
    }
}
