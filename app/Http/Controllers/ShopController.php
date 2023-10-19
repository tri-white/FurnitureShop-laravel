<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class ShopController extends Controller
{
    public function index($page){


        $products = Product::all();
        $categories = Category::all();

        $productsPerPage = 4;
        $currentPage = $page;
        $startIndex = ($currentPage - 1) * $productsPerPage;
        $productsArray = $products->toArray();
        $totalPages = ceil($products->count() / $productsPerPage);
        $currentPageProducts = array_slice($productsArray, $startIndex, $productsPerPage);

        return view('shop', ['categories'=>$categories, 'currentPage'=>$page, 'currentPageProducts'=>$currentPageProducts, 'totalPages'=>$totalPages]);
    }
    public function addView(){
        $categories = Category::all();
        return view('add-product', ['categories'=>$categories]);
    }

    public function search(){
        return redirect()->back();
    }
}
