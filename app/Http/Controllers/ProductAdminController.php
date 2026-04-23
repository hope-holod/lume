<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{

    public function create(Request $request)
    {
        if (!auth()->check() || auth()->user()->role_id != 2) abort(403);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'collection_id' => $request->collection_id,
        ]);

        return back()->with('success', 'Товар добавлен');
    }
    

    public function update(Request $request, $id)
    {
        if (!auth()->check() || auth()->user()->role_id != 2) abort(403);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->collection_id = $request->collection_id;


        $product->save();

        return back()->with('success', 'Товар обновлён');
    }


    public function delete($id)
    {
        if (!auth()->check() || auth()->user()->role_id != 2) abort(403);

        Product::where('product_id', $id)->delete();

        return back()->with('success', 'Товар удалён');
    }
}
