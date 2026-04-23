@extends('layout')

@section('title', 'Избранное')

@section('content')
<div class="account-wrapper">
    <h1 class="account-title">Избранное</h1>

    @if($favorites->isEmpty())
        <p style="font-size:18px;">У вас пока нет избранных товаров.</p>
    @else
        <div style="
                    display:grid;
                    grid-template-columns:repeat(auto-fill, minmax(250px, 1fr));
                    gap:25px;
                ">
                    @foreach($favorites as $fav)
                        <div style="
            background: var(--beige);
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        ">

            {{-- Картинка --}}
            <a href="{{ route('products.show', $fav->product->product_id) }}">
                <img src="{{ asset($fav->product->images->first()->image ?? 'placeholder.jpg') }}"
                    style="width:100%; border-radius:12px; margin-bottom:15px;">
            </a>

            {{-- Название --}}
            <h3 style="margin:0 0 10px; font-size:18px; font-weight:600;">
                {{ $fav->product->name }}
            </h3>

            {{-- Цена --}}
            <p style="margin:0 0 15px; font-size:18px; font-weight:600;">
                {{ $fav->product->price }} BYN
            </p>

            {{-- Кнопки --}}
            <div style="display:flex; gap:10px;">

                {{-- Подробнее --}}
                <a href="{{ route('products.show', $fav->product->product_id) }}"
                class="btn"
                style="flex:1; text-align:center; background:var(--choco); color:#fff; padding:10px 0; border-radius:8px;">
                    Подробнее
                </a>

                {{-- В корзину --}}
                <form method="POST" action="{{ route('cart.add', $fav->product->product_id) }}" style="flex:1;">
                    @csrf
                    <button class="btn"
                            style="width:100%; background:var(--choco-dark); color:#fff; padding:10px 0; border-radius:8px;">
                        В корзину
                    </button>
                </form>

            </div>

            {{-- Удалить из избранного --}}
            <form method="POST" action="{{ route('favorites.toggle', $fav->product_id) }}"
                style="margin-top:12px; text-align:right;">
                @csrf
                <button class="btn-primary btn" 
                style="
                    background:none;
                    border: 2px solid var(--choco);
                    cursor:pointer;
                    font-size:18px;
                    color:var(--choco);
                    width:100%;
                "
                >
                    Удалить
                </button>
            </form>

        </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
