<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())
            ->with('product.images')
            ->get();

        return view('favorites.index', compact('favorites'));
    }

    public function toggle($productId)
    {
        $existing = Favorite::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($existing) {
            $existing->delete();
        } else {
            Favorite::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
            ]);
        }

        return back();
    }
}
