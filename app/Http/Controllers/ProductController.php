<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function details($id){
        $product = Product::where('id',$id)->first();
        return view('cards/product-details', ['product'=>$product, 'comms'=>$product->comments()->get()]);
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name-prod' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'category' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('products');

        $product = new Product;
        $product->name = $validatedData['name-prod'];
        $product->price = $validatedData['price'];
        $product->photo = $imagePath;
        $product->category_id = $validatedData['category'];
        $product->save();

        return redirect()->back()->with('success','Успішно додано новий предмет в асортимент');
    }
    public function delete($productId) {
        $product = Product::find($productId);
        
        if (!$product) {
            return false;
        }
    
        $product->comments()->delete();
    
        $product->delete();
        return redirect()->route('shop')->with('success','Предмет видалено');
    }
    
}

