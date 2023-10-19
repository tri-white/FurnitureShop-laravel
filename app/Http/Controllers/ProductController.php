<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function details($id){
        $product = Product::where('id',$id)->first();
        return view('cards/product-details', ['product'=>$product, 'comms'=>$product->comments()]);
    }
}
