<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('shop', ['products'=>$products, 'categories'=>$categories]);
    }
    public function addView(){
        $categories = Category::all();
        return view('add-product', ['categories'=>$categories]);
    }
    public function add(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name-prod' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'category' => 'required|string',
        ]);

        // Handle the uploaded image
        $imagePath = $request->file('image')->store('products', 'public');

        // Create a new product
        $product = new Product;
        $product->name = $validatedData['name-prod'];
        $product->price = $validatedData['price'];
        $product->photo = $imagePath;
        $product->category_id = $validatedData['category'];
        $product->save();

        return redirect()->back()->with('success','Успішно додано новий предмет в асортимент');
    }
    public function search(){
        return redirect()->back();
    }
}
