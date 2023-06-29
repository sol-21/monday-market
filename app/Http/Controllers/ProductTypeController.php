<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductTypeController extends Controller
{
    public function jackets()
    {
        $products = Product::where('type', 'jacket')->paginate(3);
        return view('guest_pages.jackets', ['products' => $products]);

    }
    public function trousers()
    {
        $products = Product::where('type', 'touser')->paginate(3);
        return view('guest_pages.trousers', ['products' => $products]);
    }
    public function shirts()
    {
        $products = Product::where('type', 'shirt')->paginate(3);
        return view('guest_pages.shirts', ['products' => $products]);
    }
}
