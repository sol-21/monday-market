<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $productsPaginate = Product::latest()->paginate(3);

        $productCount = $products->count();

        $trousers = $products->where('type', 'touser');
        $trousersCount = $trousers->count();

        $shirts = $products->where('type', 'shirt');
        $shirtsCount = $shirts->count();
        $jackets = $products->where('type', 'jacket');
        $jacketsCount = $jackets->count();

        return view('home', ['productsPaginate' => $productsPaginate, 'productCount' => $productCount, 'trousersCount' => $trousersCount, 'shirtsCount' => $shirtsCount, 'jacketsCount' => $jacketsCount]);
    }
}
