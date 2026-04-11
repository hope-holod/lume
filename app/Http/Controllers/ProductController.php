<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller{

public function index(Request $request)
{
    $query = Product::query();

    // Поиск
    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Категория
    if ($request->category) {
        $query->where('category', $request->category);
    }

    // Стиль
    if ($request->style) {
        $query->where('style', $request->style);
    }

    // Сортировка
    if ($request->sort === 'name_asc') {
        $query->orderBy('name', 'asc');
    }
    if ($request->sort === 'name_desc') {
        $query->orderBy('name', 'desc');
    }
    if ($request->sort === 'price_asc') {
        $query->orderBy('price', 'asc');
    }
    if ($request->sort === 'price_desc') {
        $query->orderBy('price', 'desc');
    }

    $products = $query->get();

    return view('products.index', compact('products'));
}
public function show($id)
{
    $product = Product::with('images')->findOrFail($id);
    return view('products.show', compact('product'));
}

}

