<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    //show
    public function show(Warehouse $warehouse, Product $product)
    {
        if (Auth::user()->id != $warehouse->user_id) {
            abort(403);
        }
        if ($product->warehouse_id != $warehouse->id) {
            abort(404);
        }

        return view('product.show', ['warehouse' => $warehouse, 'product' => $product]);
    }

    //create product
    public function create(Warehouse $warehouse)
    {

        return view('product.create',['warehouse' => $warehouse]);
    }

    //store product
    public function store(Request $request, Warehouse $warehouse)
    {
        $product = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'code' => 'required',

        ]);

        $warehouse->products()->create($product);

        return redirect()->route('warehouse.show', ['warehouse' => $warehouse->id])->with(['success' => 'Product created successfully']);
    }
}
