<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(3);
        return view('guest_pages.product', compact('products'));
    }
    // public function adminIndex()
    // {
    //     $products = Product::latest()->paginate(3);
    //     return view('admin.display_products', compact('products'));
    // }

    public function searchProduct(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $searchQuery = $request->search;

        $searchProducts = Product::where('name', 'LIKE', '%' . $searchQuery . '%')->latest()->paginate(3);

        if ($searchProducts->isEmpty()) {
            return redirect()->back()->with('error', 'No related results found.');
        }

        return view('guest_pages.search_products', compact('searchProducts'));
    }

    public function adminSearch(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $searchQuery = $request->search;

        $searchProducts = Product::where('name', 'LIKE', '%' . $searchQuery . '%')->latest()->paginate(3);

        if ($searchProducts->isEmpty()) {
            return redirect()->back()->with('error', 'No related results found.');
        }

        return view('admin.display_products', compact('searchProducts'));

    }

    public function create()
    {
        return view('admin.add_product');
    }

    public function store(Request $request)
    {
        $validatedProduct = $request->validate([
            'name' => 'required',
            'sex' => 'required',
            'type' => 'required',
            'color' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20000|required',
            'size' => 'nullable',

        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('products'), $imageName);
                $validatedProduct['image'] = 'products/' . $imageName;
        }
        
        Product::create($validatedProduct);
        return redirect()->back()->with('success', 'Product  Added successfully!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('guest_pages.product_detail', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.edit_product', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $validatedProduct = $request->validate([
            'name' => 'required',
            'sex' => 'required',
            'type' => 'required',
            'color' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20000',
            'size' => 'nullable',

        ]);
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        $validatedProduct['image'] = 'products/' . $imageName;
    }
        
        $product->update($validatedProduct);
        return redirect()->back()->with('success', 'Product  Updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete($product);
        return redirect()->back()->with('success', $product->id .   'deleted successfully!');
    }

}
