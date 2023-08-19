<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $userName = Auth::user()->name;
        $search = $request['search'] ?? "";
        if ($search != "") {
            //where
            $products = Product::where('name', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%")
                ->orWhere('origin_price', 'like', "%$search%")
                ->orWhere('sale_price', 'like', "%$search%")
                ->orWhere('discount_percent', 'like', "%$search%")
                ->orWhere('category_id', 'like', "%$search%")->paginate(2);
        } else {
            $products = Product::paginate(2);
        }
        $data = compact('products', 'search','userName');
        return view('backend.pages.products.index')->with($data);
    }


    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.products.create')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $product = new Product();
        $product['name'] = $input['name'];
        $product['slug'] = Str::slug($product['name']);
        $product['category_id'] = $input['category_id'];
        $product['sale_price'] = $input['sale_price'];
        $product['origin_price'] = $input['origin_price'];
        $product['discount_percent'] = 100 - ($input['sale_price'] / $input['origin_price'])*100;
        $product['content'] = $input['content'];
        $product['status'] = $input['status'];
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('backend.pages.products.edit')->with(['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $product = Product::find($id);
        $product['name'] = $input['name'];
        $product['category_id'] = $input['category_id'];
        $product['sale_price'] = $input['sale_price'];
        $product['origin_price'] = $input['origin_price'];
        $product['discount_percent'] = 100 - ($input['sale_price'] / $input['origin_price'])*100;
        $product['content'] = $input['content'];
        $product['status'] = $input['status'];
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->route('products.index');
    }
}
