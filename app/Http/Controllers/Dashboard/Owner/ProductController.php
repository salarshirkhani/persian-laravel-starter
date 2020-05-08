<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Owner\ProductStoreRequest;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    public function create() {
        return view('dashboard.owner.products.create', ['company' => \Auth::user()->company]);
    }

    public function store(ProductStoreRequest $request) {
        $product = new Product($request->validated());
        $product->photo = $request->file('photo')->store('products', 'public');
        $product->company()->associate(\Auth::user()->company);
        $product->save();
        return redirect()->route('dashboard.owner.companies.show', ['company' => $product->company]);
    }
}
