<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller{

// public function index(Request $request)
// {
//     // $query = Product::with('images');
//         $categories = \App\Models\Category::all();
//     $query = \App\Models\Product::with(['images', 'category']);

//     // Фильтр: категория
//     if ($request->filled('category_id')) {
//         $query->where('category_id', $request->category_id);
//     }

//     // Фильтр: стиль
//     if ($request->filled('style')) {
//         $query->where('style', $request->style);
//     }

//     // Фильтр: материал
//     if ($request->filled('material')) {
//         $query->where('material', $request->material);
//     }

//     // Фильтр: цвет
//     if ($request->filled('color')) {
//         $query->where('color', $request->color);
//     }

//     // Фильтр: размер
//     if ($request->filled('size')) {
//         $query->where('size', $request->size);
//     }

//     // Фильтр: мощность
//     if ($request->filled('power')) {
//         $query->where('power', $request->power);
//     }

//     // Сортировка
//     switch ($request->sort) {
//         case 'name_asc':
//             $query->orderBy('name', 'asc');
//             break;

//         case 'name_desc':
//             $query->orderBy('name', 'desc');
//             break;

//         case 'price_asc':
//             $query->orderBy('price', 'asc');
//             break;

//         case 'price_desc':
//             $query->orderBy('price', 'desc');
//             break;
//     }

//     // 3. Выполняем запрос — ВОТ ТУТ создаётся $products
//     $products = $query->get();

//     // 4. Возвращаем view — теперь $products и $categories существуют
//     return view('products.index', compact('products', 'categories'));
// }

public function index(Request $request)
{
    $categories = Category::all();
    $query = Product::with(['images', 'category']);

    // Категория
    if ($request->category_id !== null && $request->category_id !== '') {
        $query->where('category_id', $request->category_id);
    }

    // Стиль
    if ($request->style !== null && $request->style !== '') {
        $query->where('style', $request->style);
    }

    // Материал
    if ($request->material !== null && $request->material !== '') {
        $query->where('material', $request->material);
    }

    // Цвет
    if ($request->color !== null && $request->color !== '') {
        $query->where('color', $request->color);
    }

    // Размер
    if ($request->size !== null && $request->size !== '') {
        $query->where('size', $request->size);
    }

    // Мощность
    if ($request->power !== null && $request->power !== '') {
        $query->where('power', $request->power);
    }

    // Сортировка
    switch ($request->sort) {
        case 'name_asc':
            $query->orderBy('name', 'asc');
            break;

        case 'name_desc':
            $query->orderBy('name', 'desc');
            break;

        case 'price_asc':
            $query->orderBy('price', 'asc');
            break;

        case 'price_desc':
            $query->orderBy('price', 'desc');
            break;
    }

    $products = $query->get();

    return view('products.index', compact('products', 'categories'));
}



public function search(Request $request)
{
    $q = trim($request->get('q'));

    $products = Product::with('images', 'category')
        ->when($q, function ($query) use ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%");
            });
        })
        ->get();

    $categories = Category::all(); // ← ЭТО ОБЯЗАТЕЛЬНО

    return view('products.index', compact('products', 'categories', 'q'));

}

public function show($id)
{
    $product = Product::with('images')->findOrFail($id);
    return view('products.show', compact('product'));
}

}

