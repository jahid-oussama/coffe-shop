<?php

namespace App\Http\Controllers;

use App\Models\Prodacts;
use App\Models\categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $productsArr = Prodacts::all();
        $categoriess=categories::all();
        $products=[
            'products'=>$productsArr
        ];
        $categories=[
            'categories'=>$categoriess
        ];
        return view('home', compact('products','categories'));
    }
}
