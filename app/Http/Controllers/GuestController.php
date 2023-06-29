<?php

namespace App\Http\Controllers;

use App\Models\Product;

class GuestController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(3);
        return view('welcome', compact('products'));
    }
    public function about()
    {
        return view('guest_pages.about');
    }

}
