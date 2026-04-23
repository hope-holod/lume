<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Страница оформления заказа
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('product.images')
            ->get();

        if ($cart->isEmpty()) {
            return redirect('/cart')->with('error', 'Корзина пуста.');
        }

        return view('checkout.index', compact('cart'));
    }

    // Обработка оформления заказа
    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:50',
            'phone' => 'required|string|regex:/^\+?[0-9\s\-\(\)]{7,20}$/',
            'address' => 'required|string|min:5|max:200',
            'comment' => 'nullable|string|max:500',
        ], [
            'name.required' => 'Введите ваше имя.',
            'name.min' => 'Имя должно содержать минимум 2 символа.',
            'phone.required' => 'Введите номер телефона.',
            'phone.regex' => 'Введите корректный номер телефона.',
            'address.required' => 'Введите адрес доставки.',
            'address.min' => 'Адрес слишком короткий.',
        ]);


        $cart = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cart->isEmpty()) {
            return redirect('/cart')->with('error', 'Корзина пуста.');
        }

        // Создаём заказ
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_date' => now(),
            'status' => 'pending',
            'total_price' => $cart->sum(fn($i) => $i->product->price * $i->quantity),
            'comment' => $request->comment,
        ]);

        // Создаём позиции заказа
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->order_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Очищаем корзину
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('checkout.success');
    }

    // Страница "Спасибо за заказ"
    public function success()
    {
        return view('checkout.success');
    }
}
