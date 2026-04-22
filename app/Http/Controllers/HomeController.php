<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

// class HomeController extends Controller
// {
//     public function index()
//     {
//         $products = Product::with('images', 'category')
//             ->latest()
//             ->take(8)
//             ->get();

//         $categories = Category::all();

//         return view('home', compact('products', 'categories'));
//     }
// }


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->latest()->take(8)->get();

        return view('home', compact('products'));
    }
}
