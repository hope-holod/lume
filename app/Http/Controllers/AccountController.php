<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AccountController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $orders = Order::where('user_id', Auth::id())
            ->with('items.product.images')
            ->orderBy('order_date', 'desc')
            ->get();

        return view('account.index', compact('user', 'orders'));
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        Auth::logout();

        $user->delete();

        return redirect('/')->with('status', 'Аккаунт удалён');
    }
    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('items.product.images')
            ->orderBy('order_date', 'desc')
            ->get();

        return view('account.orders', compact('orders'));
    }

}
