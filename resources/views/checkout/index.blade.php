@extends('layout')

@section('content')

<h1 class="page-title">Оформление заказа</h1>

<div style="max-width:900px; margin:0 auto;">

    {{-- Список товаров --}}
    <div style="margin-bottom:30px;">
        @foreach ($cart as $item)
            <div style="
                display:flex;
                align-items:center;
                justify-content:space-between;
                padding:15px 0;
                border-bottom:1px solid #e5e5e5;
            ">
                <div style="display:flex; align-items:center; gap:15px;">
                    <img src="{{ asset($item->product->images->first()->image ?? 'placeholder.jpg') }}"
                         style="width:70px; border-radius:10px;">

                    <div>
                        <p style="margin:0; font-size:17px; font-weight:600;">
                            {{ $item->product->name }}
                        </p>
                        <p style="margin:3px 0 0; color:#7a6a5a;">
                            {{ $item->quantity }} × {{ $item->product->price }} BYN
                        </p>
                    </div>
                </div>

                <p style="font-size:18px; font-weight:600;">
                    {{ $item->product->price * $item->quantity }} BYN
                </p>
            </div>
        @endforeach
    </div>

    {{-- Форма --}}
    <form method="POST" action="{{ route('checkout.process') }}"
          style="background:#FFFFFF; padding:25px; border-radius:25px;">
        @csrf

        <h2 style="margin-bottom:20px;">Данные для доставки</h2>

        <label>Имя</label>
        <input type="text" name="name" required
               style="width:100%; padding:12px; margin-bottom:15px; border-radius:8px; border:1px solid #ccc;">
        @error('name')
            <p style="color:#b33a3a; font-size:14px; margin-top:5px;">{{ $message }}</p>
        @enderror


        <label>Телефон</label>
        <input type="text" name="phone" required
               style="width:100%; padding:12px; margin-bottom:15px; border-radius:8px; border:1px solid #ccc;">
        @error('name')
            <p style="color:#b33a3a; font-size:14px; margin-top:5px;">{{ $message }}</p>
        @enderror


        <label>Адрес доставки</label>
        <input type="text" name="address" required
               style="width:100%; padding:12px; margin-bottom:15px; border-radius:8px; border:1px solid #ccc;">
        @error('name')
            <p style="color:#b33a3a; font-size:14px; margin-top:5px;">{{ $message }}</p>
        @enderror


        <label>Комментарий</label>
        <textarea name="comment"
                  style="width:100%; padding:12px; height:100px; border-radius:8px; border:1px solid #ccc;"></textarea>

        <h2 style="margin-top:25px;">
            Итого:
            <span style="font-weight:700;">
                {{ $cart->sum(fn($i) => $i->product->price * $i->quantity) }} BYN
            </span>
        </h2>

        <button class="btn btn-primary" style="margin-top:20px; width:100%; font-size:18px;">
            Подтвердить заказ
        </button>
    </form>

</div>

@endsection
