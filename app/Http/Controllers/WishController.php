<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wish;

class WishController extends Controller
{
    public function index($userid){
        $wishes = Wish::where('user_id', $userid)->get();
        return view('wishlist', ['wishes'=>$wishes]);
    }
}
