
@extends('layout')

@section('content')

<h1 class="page-title">Корзина</h1>

@if ($cart->isEmpty())
    <p style="font-size:18px; margin-top:20px;">Ваша корзина пуста.</p>
@else

<div class="cart-container" style="max-width:900px; margin:0 auto;">

    @foreach ($cart as $item)
        <div class="cart-row" style="
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:20px;
            border-bottom:1px solid #e5e5e5;
        ">
            {{-- Фото --}}
            <div style="width:100px;">
                <img src="{{ asset($item->product->images->first()->image ?? 'placeholder.jpg') }}"
     style="width:100%; border-radius:12px;">

            </div>

            {{-- Название --}}
            <div style="flex:1; padding-left:20px;">
                <p style="font-size:18px; font-weight:600; margin:0;">
                    {{ $item->product->name }}
                </p>
                <p style="margin:5px 0 0; color:#7a6a5a;">
                    {{ $item->product->price }} BYN
                </p>
            </div>

            {{-- Количество с плюс/минус --}}
            <div style="display:flex; align-items:center; gap:10px;">

                <form method="POST" action="{{ route('cart.update', $item->cart_id) }}">
                    @csrf
                    <div style="display:flex; align-items:center; gap:8px;">

                        <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}"
                            style="
                                width:32px; height:32px;
                                border-radius:8px;
                                border:none;
                                background:var(--choco);
                                color:white;
                                font-size:18px;
                                cursor:pointer;
                            ">–</button>

                        <span style="font-size:18px; min-width:30px; text-align:center;">
                            {{ $item->quantity }}
                        </span>

                        <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}"
                            style="
                                width:32px; height:32px;
                                border-radius:8px;
                                border:none;
                                background:var(--choco);
                                color:white;
                                font-size:18px;
                                cursor:pointer;
                            ">+</button>

                    </div>
                </form>

            </div>

            {{-- Удалить --}}
            <div>
                <form method="POST" action="{{ route('cart.remove', $item->cart_id) }}">
                    @csrf
                    <button style="
                        background:none;
                        border:none;
                        color:#b33a3a;
                        font-size:16px;
                        cursor:pointer;
                        margin-left:20px;
                    ">Удалить</button>
                </form>
            </div>

        </div>
    @endforeach

    {{-- Итог --}}
    <div style="text-align:right; margin-top:25px; display:flex; flex-direction:row; align-items: center;
    justify-content: space-between;">
        <h2 style="font-size:22px; margin:0px;">
            Итого:
            <span style="font-weight:700;">
                {{ $cart->sum(fn($i) => $i->product->price * $i->quantity) }} BYN
            </span>
        </h2>

        <a href="/checkout" class="btn btn-primary"
           style="display:inline-block;">
            Оформить заказ
        </a>
    </div>

</div>

@endif

@endsection
