<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Показ корзины
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();

        return view('cart.index', compact('cart'));
    }

    // Добавление товара
    public function add($product_id)
    {
        $product = Product::where('product_id', $product_id)->firstOrFail();

        $item = Cart::where('user_id', Auth::id())
            ->where('product_id', $product_id)
            ->first();

        if ($item) {
            $item->quantity++;
            $item->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'quantity' => 1,
                'added_at' => now(),
            ]);
        }

        return back()->with('success', 'Товар добавлен в корзину.');
    }

    // Обновление количества
    public function update(Request $request, $cart_id)
    {
        $item = Cart::where('cart_id', $cart_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $item->quantity = max(1, (int)$request->quantity);
        $item->save();

        return back();
    }

    // Удаление товара
    public function remove($cart_id)
    {
        Cart::where('cart_id', $cart_id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Товар удалён.');
    }
}
