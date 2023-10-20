<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index($page, $searchKey, $category, $sort)
    {
        $page = (int)$page;
        $categories = Category::all();
        $query = Product::query();

        if ($searchKey!=="null") {
            $query->where('name', 'like', '%' . $searchKey . '%');
        }

        if ($category !== 'all') {
            $query->where('category_id', $category);
        }

        // Add sorting logic based on $sort
        // Implement your sorting logic here

        $products = $query->get();
    
        $productsPerPage = 4;
        $startIndex = ($page - 1) * $productsPerPage;
        $totalPages = ceil($products->count() / $productsPerPage);
        $currentPageProducts = $products->slice($startIndex, $productsPerPage);
    
        return view('shop', [
            'categories' => $categories,
            'currentPage' => $page,
            'currentPageProducts' => $currentPageProducts,
            'totalPages' => $totalPages,
            'searchInput' => $searchKey,
            'selectedCategory' => $category,
            'selectedSort' => $sort,
        ]);
    }
    

    public function addView(){
        $categories = Category::all();
        return view('add-product', ['categories'=>$categories]);
    }
    public function search(Request $request)
    {
        $searchKey = $request->input('search-input-key');
        $category = $request->input('product-category-filter');
        $sort = $request->input('product-sort');

        if($searchKey === "" || $searchKey === null){
            $searchKey="null";
        }
    
       return $this->index(1, $searchKey, $category, $sort);
    }
}
